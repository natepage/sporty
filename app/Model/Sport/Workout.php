<?php

namespace App\Model\Sport;

use App\Model\CrumbElementInterface;
use App\Presenters\DatePresenter;
use App\Scopes\OrderByScope;
use App\Scopes\WorkoutWithsScope;
use Illuminate\Database\Eloquent\Model;

class Workout extends Model implements CrumbElementInterface
{
    use DatePresenter;

    protected $fillable = ['level_id'];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new WorkoutWithsScope());
        static::addGlobalScope(new OrderByScope('created_at', 'desc'));
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function series()
    {
        return $this->hasMany(Series::class);
    }

    /**
     * {@inheritdoc}
     */
    public function getCrumb(): string
    {
        return sprintf('%s - %s', $this->getCreatedAtAttribute($this->created_at), $this->level->name);
    }
}
