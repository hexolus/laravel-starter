<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'id', 'created_at', 'updated_at'
  ];

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name',
  ];

  public function users()
  {
    return $this->belongsToMany(User::class)->withTimestamps();
  }
}
