<?php

namespace App\Contracts;

use Illuminate\Contracts\Auth\Authenticatable;

interface User extends Authenticatable
{
  /**
   * Generate UID
   * @return string
   */
  public function generate_uid();

  /**
   * Get UID key
   * @return string
   */
  public function get_uid_key();

  /**
   * Get UID length
   * @return int
   */
  public function get_uid_length();

  /**
   * Get UID
   * @return string
   */
  public function get_uid();

  /**
   * Get the access tokens that belong to model.
   *
   * @return \Illuminate\Database\Eloquent\Relations\MorphMany
   */
  public function tokens();

  /**
   * Determine if the current API token has a given scope.
   *
   * @param  string  $ability
   * @return bool
   */
  public function tokenCan(string $ability);

  /**
   * Create a new personal access token for the user.
   *
   * @param  string  $name
   * @param  array  $abilities
   * @return \Laravel\Airlock\NewAccessToken
   */
  public function createToken(string $name, array $abilities = ['*']);

  /**
   * Get the access token currently associated with the user.
   *
   * @return \Laravel\Airlock\Contracts\HasAbilities
   */
  public function currentAccessToken();

  /**
   * Set the current access token for the user.
   *
   * @param  \Laravel\Airlock\Contracts\HasAbilities  $accessToken
   * @return $this
   */
  public function withAccessToken($accessToken);

  /**
   * Get media belongs to User
   *
   * @return \Illuminate\Database\Eloquent\Relations\MorphMany
   */
  public function media();
}
