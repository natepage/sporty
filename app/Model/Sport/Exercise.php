<?php

namespace App\Model\Sport;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    public $timestamps = false;

    protected $fillable = ['name'];
}
