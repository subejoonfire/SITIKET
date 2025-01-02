<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class verified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && auth()->user()->email_verified_at !== NULL && auth()->user()->phone_verified_at !== NULL) {
            return $next($request);
        } else {
            if (auth()->user()->email_verified_at === NULL && auth()->user()->phone_verified_at === NULL) {
                return redirect()->to(url('email/verification/notice'));
            } elseif (auth()->user()->email_verified_at === NULL) {
                return redirect()->to(url('email/verification/notice'));
            } elseif (auth()->user()->phone_verified_at === NULL) {
                return redirect()->to(url('phone/verification/notice'));
            }
        }
        auth()->logout();
        return redirect()->to(url('/login'));
    }
}
