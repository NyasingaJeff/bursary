<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([

            'name' => 'Admin Admin',
            'email' => '0768187628',
            'idNumber'=>'33803954',
            'email_verified_at' => now(),
            'password' => Hash::make("secret"),
            'idScan'=>'idScan',
            'created_at' => now(),
            'updated_at' => now(),
            'address'=>'Nairobi , Kenya.',
            'accountStatus'=>'active',
            'profPictureUrl'=>'default.jpg',
            'idScan'=>'id.pdf',
            'chiefsLttr'=>'random',

        ]);
     
    }
}
