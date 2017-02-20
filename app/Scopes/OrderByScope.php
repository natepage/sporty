<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class OrderByScope implements Scope
{
    private $field;
    private $order;

    public function __construct(string $field, string $order = 'asc')
    {
        $this->field = $field;
        $this->order = $order;
    }

    /**
     * {@inheritdoc}
     */
    public function apply(Builder $builder, Model $model)
    {
        $builder->orderBy($this->field, $this->order);
    }
}
