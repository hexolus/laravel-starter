<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
  private $specialChars = ["!", "@", "#", "%", "&", "-"];

  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    // Make your Custom Role here
    $guestRole = Role::create(['name' => 'Guest']);
    $adminRole = Role::create(['name' => 'Administrator']);
    $userRole = Role::create(['name' => 'User']);

    // This is default user
    foreach ([
      [
        'id' => 1,
        'email' => "guest",
        'name' => "Guest",
        'password' => $this->generatePassword(),
        'email_verified_at' => now(),
        'role' => $guestRole
      ],
      [
        'id' => random_int(100, 900),
        'email' => "root",
        'name' => "System Administrator",
        'password' => $this->generatePassword(),
        'email_verified_at' => now(),
        'role' => $adminRole
      ],
    ] as $input) {
      $role = $input['role'];
      unset($input['role']);

      echo "Creating user `{$input['name']}` with email `{$input['email']}` and password: {$input['password']} ";
      $input['password'] = Hash::make($input['password']);
      $user = User::create($input);
      $user->roles()->attach($role);
      echo "DONE!\n";
    }

    // for security purpose.
    $DBUserStartingOn = random_int(1000, 2000);
    DB::statement("ALTER TABLE users AUTO_INCREMENT = $DBUserStartingOn;");
  }

  private function generatePassword()
  {
    shuffle($this->specialChars);

    $randomAscii = Str::random(32) . implode("", $this->specialChars);
    $j = random_int(1, 9);

    for ($i = 0; $i < $j; $i++) {
      $randomAscii = str_shuffle($randomAscii);
    }

    return str_shuffle($randomAscii);
  }
}
