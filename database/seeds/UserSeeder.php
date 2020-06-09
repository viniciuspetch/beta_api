<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 3)->create()->each(function ($user) {
            $user->save();
        });
        $user = new App\User();
        $user->name = "asd";
        $user->email = "asd@asd.asd";
        $user->email_verified_at = now();
        $user->password = "asd";
        $user->remember_token = Str::random(10);
        $user->save();
    }
}
