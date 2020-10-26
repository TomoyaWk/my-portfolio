<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        DB::table('users')->insert(
            [
                'id' => 1,
                'name' => 'AdminTomo',
                'email' => 'tomoya.portfolio@gmail.com',
                'email_verified_at' => null,
                'password' => Hash::make('inukai66'),
                'api_token' => str_random(60)
            ]
        );
    }
}
