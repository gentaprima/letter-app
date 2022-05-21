<?php

namespace Database\Seeders;

use App\Models\ModelUsers;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        ModelUsers::create(
            [
                'email'=>'prasetya2423@gmail.com',
                'full_name'=>"prasetya",
                'phone_number'=>'089506277284',
                'password'=>Hash::make("google123"),
                'gender'=>0,
                'date_birth'=>'1996-09-19',
                'role'=>1
            ]
        );
    }
}
