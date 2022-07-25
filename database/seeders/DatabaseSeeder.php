<?php

namespace Database\Seeders;

use App\Models\ModelInstance;
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
                'email'=>'eka123@gmail.com',
                'full_name'=>"Eka",
                'phone_number'=>'08929382332',
                'password'=>Hash::make("google123"),
                'gender'=>0,
                'date_birth'=>'1996-09-19',
                'role'=>0
            ]
        );
    }
}
