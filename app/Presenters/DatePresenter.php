<?php

namespace App\Presenters;

use Carbon\Carbon;

trait DatePresenter
{
    public function getCreatedAtAttribute($date)
    {
        return $this->getDateFormated($date);
    }

    public function getUpdatedAtAttribute($date)
    {
        return $this->getDateFormated($date);
    }

    private function getDateFormated($date)
    {
        return Carbon::parse($date)->format('d/m/Y');
    }
}
