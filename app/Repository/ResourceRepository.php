<?php

namespace App\Repository;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

abstract class ResourceRepository
{
    /** @var Model */
    protected $model;

    public function all()
    {
        return $this->model->all();
    }

    public function paginate($n)
    {
        return $this->model->paginate($n);
    }

    public function store(array $inputs)
    {
        return $this->model->create($inputs);
    }

    public function getById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function update($id, array $inputs)
    {
        return $this->getById($id)->update($inputs);
    }

    public function destroy($id)
    {
        return $this->getById($id)->delete();
    }
}
