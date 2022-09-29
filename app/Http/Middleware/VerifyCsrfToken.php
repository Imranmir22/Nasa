<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        '/api/registerd',
        '/api/userlogin',
        '/api/bucketvolumes',
        '/api/ballvolumes',
        'api/fill',
        'employee',
        'company',
        'show-data'
    ];
}
