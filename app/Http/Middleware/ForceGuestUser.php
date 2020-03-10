<?php

namespace App\Http\Middleware;

use Closure;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ForceGuestUser
{
  /**
   *
   * @return \App\Contracts\User
   */
  private function login()
  {
    if (auth()->attempt(['email' => "guest", 'password' => env('GUEST_PASSWORD')])) {
      return auth()->user();
    }

    throw new Error("Cannot sign-in as guest");
  }
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @return mixed
   */
  public function handle(Request $request, Closure $next)
  {
    if (!env('GUEST_PASSWORD')) {
      throw new Error("Guest has not been set. Please seed database.");
    }

    if (!auth()->check()) {
      $user = $this->login();
      session()->put('airlock_token', $user->createToken("Guest Token", ['public:*'])->plainTextToken);
    }

    return $next($request);
  }
}
