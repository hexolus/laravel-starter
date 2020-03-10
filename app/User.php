<?php

namespace App;

use App\Traits\HasUID;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Airlock\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
  use Notifiable, HasApiTokens, HasUID, SoftDeletes;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name', 'email', 'password', 'phone',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'password', 'remember_token', 'id', 'email_verified_at', 'phone_verified_at', 'created_at', 'updated_at', 'deleted_at'
  ];

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
    'phone_verified_at' => 'datetime',
  ];

  protected $with = ['avatar', 'roles'];

  /**
   * The accessors to append to the model's array form.
   *
   * @var array
   */
  protected $appends = ['email_is_verified', 'phone_is_verified'];

  public function avatar()
  {
    return $this->hasOne(Avatar::class);
  }

  public function getEmailIsVerifiedAttribute()
  {
    return $this->attributes['email_verified_at'] != null;
  }

  public function getPhoneIsVerifiedAttribute()
  {
    return $this->attributes['phone'] != null && $this->attributes['phone_verified_at'] != null;
  }

  public function roles()
  {
    return $this->belongsToMany(Role::class)->withTimestamps();
  }

  public function hasRole(string $role)
  {
    return $this->roles()->where('name', $role)->count() > 0;
  }

  public function hasAnyRole(array $roles)
  {
    return $this->roles()->whereIn('name', $roles)->count() > 0;
  }
}
