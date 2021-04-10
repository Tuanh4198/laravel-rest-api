<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Routing\Middleware;
use Illuminate\Contracts\Routing\ResponseFactory;
use App\AssignedRoles;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;
use Session;

class CheckUser
{
	/**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
     public function __construct(Guard $auth, ResponseFactory $response) {
        $this->auth = $auth;
        $this->response = $response;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
		if ($this->auth->check()) {
            if ($this->auth->user()->active == 0) {
				Auth::logout();
				$errors = ''.__('Your account is not active').'';
                return $this->response->redirectTo('/login')->with('error', $errors); 
            }
            return $next($request);
        }
        return $next($request);
    }
}
