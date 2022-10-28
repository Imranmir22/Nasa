<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)   //if unauthorized user is trying to access th route he/she
    {                                         //will be reidrected to login we can even change it
        if (! $request->expectsJson()) {
            return route('login');
        }
    }
}
