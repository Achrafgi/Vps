<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            [                
                'name' => 'achraf',
                'email' => 'achraf.heddad@gmail.com',
                'password' => 'payzone01'
            ],
            [                
                'name' => 'aymane heddad',
                'email' => 'aymane.heddad@gmail.com',
                'password' => 'payzone01'
            ],
        ]);
    }
}
