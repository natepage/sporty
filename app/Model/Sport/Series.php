<?php

namespace App\Model\Sport;

use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    public $timestamps = false;

    protected $fillable = ['workout_id', 'exercise_id', 'series'];

    protected $casts = ['series' => 'json'];

    public function exercise()
    {
        return $this->belongsTo(Exercise::class);
    }
}
