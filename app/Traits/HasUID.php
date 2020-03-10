<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait HasUID
{
  public static function bootHasUID()
  {
    self::creating(function (Model $Model) {
      if (!$Model->get_uid()) {
        do {
          $uid = $Model->generate_uid();
        } while ($Model::where($Model->get_uid_key(), $uid)->count());

        $Model->{$Model->get_uid_key()} = $uid;
      }
    });
  }

  public function generate_uid()
  {
    return Str::slug(Str::random($this->get_uid_length()));
  }

  public function get_uid_key()
  {
    return 'uid';
  }

  public function get_uid_length()
  {
    return config('app.uid_length', 16);
  }

  public function get_uid()
  {
    return $this->{$this->get_uid_key()};
  }
}
