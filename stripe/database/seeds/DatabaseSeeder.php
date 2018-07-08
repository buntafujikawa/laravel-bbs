<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'First user',
            'email' => 'user@user.com',
            'password' => bcrypt('password')
        ]);
    }
}
