<?php

namespace App\Model\Athlete;

use App\Model\CrumbElementInterface;
use App\Presenters\DatePresenter;
use App\Scopes\CurrentUserScope;
use App\Scopes\OrderByScope;
use Illuminate\Database\Eloquent\Model;

class Measurements extends Model implements CrumbElementInterface
{
    use DatePresenter;

    protected $fillable = [
        'sholders', 'left_arm', 'right_arm', 'chest', 'waist',
        'left_thigh', 'right_thigh', 'left_calf', 'right_calf',
        'weight', 'feeling', 'images', 'user_id'
    ];

    protected $casts = [
        'images' => 'json'
    ];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new CurrentUserScope());
        static::addGlobalScope(new OrderByScope('created_at', 'desc'));
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getBodyDatas()
    {
        return array_filter($this->fillable, function($fillable) {
            return !in_array($fillable, ['weight', 'feeling', 'images', 'user_id']);
        });
    }

    public function getCrumb(): string
    {
        return (string) $this->id;
    }
}
