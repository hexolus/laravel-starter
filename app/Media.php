<?php

namespace App;

use App\Traits\HasUID;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
  use HasUID;

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'id', 'created_at', 'updated_at', 'deleted_at'
  ];

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name', 'mime', 'path', 'url',
  ];
}
