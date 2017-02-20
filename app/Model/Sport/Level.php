<?php

namespace App\Model\Sport;

use App\Model\CrumbElementInterface;
use App\Scopes\LevelWithsScope;
use Illuminate\Database\Eloquent\Model;

class Level extends Model implements CrumbElementInterface
{
    public $timestamps = false;

    protected $fillable = ['name'];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new LevelWithsScope());
    }

    public function steps()
    {
        return $this->hasMany(Step::class);
    }

    public function getCrumb(): string
    {
        return $this->name;
    }
}
