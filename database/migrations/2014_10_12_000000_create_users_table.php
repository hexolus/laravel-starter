<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('users', function (Blueprint $table) {
      $table->id();
      $table->string('uid')->unique();
      $table->string('email', 200)->unique();
      $table->string('phone')->nullable()->unique();
      $table->string('name')->index();
      $table->timestamp('email_verified_at')->nullable();
      $table->timestamp('phone_verified_at')->nullable();
      $table->string('password');
      $table->rememberToken();
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
    Schema::dropIfExists('users');
  }
}
