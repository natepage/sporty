<?php

namespace App\Listeners;

use Carbon\Carbon;
use Illuminate\Auth\Events\Login;

class LoginSuccess
{
    const SESSION_KEY = 'need_measurements';

    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        $measurements = $event->user->measurements;

        if (count($measurements) == 0) {
            session()->put(self::SESSION_KEY, 'empty');
        } elseif ($this->fromAWhile($measurements)) {
            session()->put(self::SESSION_KEY, 'a_while');
        }
    }

    private function fromAWhile($measurements): bool
    {
        $last = Carbon::createFromFormat('d/m/Y', $measurements->last()->created_at);
        $now = Carbon::now();

        return $last->diffInMonths($now) > 1;
    }
}
