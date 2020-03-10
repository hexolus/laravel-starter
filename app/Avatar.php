<?php

namespace App;

use App\Traits\HasMedia;
use App\Traits\HasUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Avatar extends Model
{
  use HasUID, SoftDeletes, HasMedia;

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'id', 'created_at', 'updated_at', 'deleted_at'
  ];

  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
