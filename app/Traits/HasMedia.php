<?php

namespace App\Traits;

trait HasMedia
{
  public function media()
  {
    return $this->morphMany(get_class($this), "mediable");
  }
}
