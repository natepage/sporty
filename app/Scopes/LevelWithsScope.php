<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class LevelWithsScope implements Scope
{
    /**
     * {@inheritdoc}
     */
    public function apply(Builder $builder, Model $model)
    {
        $builder->with(['steps', 'steps.exercise']);
    }
}
