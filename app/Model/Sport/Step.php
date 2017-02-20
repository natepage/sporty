<?php

namespace App\Model\Sport;

use App\Scopes\OrderByScope;
use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'level_id',     'exercise_id',
        'rest_between', 'rest_between_unit',
        'rest_after',   'rest_after_unit',
        'pace',         'order',
        'nb_series',    'nb_repetitions',
    ];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new OrderByScope('order', 'asc'));
    }

    public function exercise()
    {
        return $this->belongsTo(Exercise::class);
    }
}
