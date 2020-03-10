<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('media', function (Blueprint $table) {
      $table->id();
      $table->string('uid')->unique();
      $table->morphs('mediable');
      $table->string('name')->index();
      $table->string('path')->index();
      $table->string('mime')->index();
      $table->string('url')->index();
      $table->timestamps();
      $table->softDeletes();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('media');
  }
}
