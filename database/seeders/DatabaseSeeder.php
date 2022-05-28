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
                'full_name'=>"prasetya",
                'phone_number'=>'08929382332',
                'password'=>Hash::make("google123"),
                'gender'=>0,
                'date_birth'=>'1996-09-19',
                'role'=>0
            ]
        );
        ModelInstance::create([
            'id'=>0,
            'nama_instansi'=>'SMK Teratai Putih Global 2 Bekasi',
            'alamat_instansi'=>'Jl. Rajawali V Jl. Anggrek Raya No.29, RT.005/RW.023, Kayuringin Jaya, Kec. Bekasi Sel., Kota Bks, Jawa Barat 17144'
        ]);
    }
}
