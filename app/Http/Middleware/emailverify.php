<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class emailverify
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && auth()->user()->email_verified_at === NULL) {
            return $next($request);
        } else {
            if (auth()->user()->level == 1) {
                return redirect()->to(url('admin'));
            } elseif (auth()->user()->level == 2) {
                return redirect()->to(url('helpdesk'));
            } elseif (auth()->user()->level == 3) {
                return redirect()->to(url('pic'));
            } elseif (auth()->user()->level == 4) {
                return redirect()->to(url('user'));
            }
        }
    }
}
