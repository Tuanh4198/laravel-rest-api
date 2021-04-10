<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Routing\Middleware;
use Illuminate\Contracts\Routing\ResponseFactory;

use App\AssignedRoles;

class Admin {

    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * The response factory implementation.
     *
     * @var ResponseFactory
     */
    protected $response;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @param  ResponseFactory  $response
     * @return void
     */
    public function __construct(Guard $auth,
                                ResponseFactory $response)
    {
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
        if ($this->auth->check())
        {
            if($this->auth->user()->user_type != 1)
            {
                if($this->auth->user()->user_type == 2){
					return $this->response->redirectTo('sale/dashboard');
				}elseif($this->auth->user()->user_type == 3){
					return $this->response->redirectTo('installer/dashboard');
				}elseif($this->auth->user()->user_type == 4){
					return $this->response->redirectTo('customer/dashboard');
				}
            }
            return $next($request);
        }
	}

}
