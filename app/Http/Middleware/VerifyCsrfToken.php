<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
    ];

    /**
    * Determine if the session and input CSRF token match.
    *
    *@param \Illuminate\Http\Request $request
    *@return bool
    */

    protected function tokensMatch($request)
    {
    	// If request is an ajax request, then check to see if token matches token provinder in
    	// the header. This way, we can use CSRF protection in ajax request also.
    	$token = $request->ajax() ? $request->header('X-CSRF-Token') : $request->input('_token');

    	return $request->session()->token() == $token;
    }
}