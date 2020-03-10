<?php

use App\Contracts\User;

if (!function_exists('user')) {
  /**
   * Get User
   * @param mixed|null $guard
   * @return User|null
   */
  function user($guard = null)
  {
    return auth($guard)->user();
  }
}

if (!function_exists('get_token_name')) {
  /**
   * Get Token Name from Request
   * @return string
   */
  function get_token_name()
  {
    return substr(request()->ip() . " -- " . request()->userAgent(), 0, 254);
  }
}
