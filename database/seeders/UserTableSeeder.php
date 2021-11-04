<?php

namespace Database\Seeders;

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
        {
            DB::table('users')->delete();
            $users = array(
                array('name' => 'Admin', 'email' => 'admin@gmail.com','mobile' => '9711192659',
                    'password'=>Hash::make('12345678'),
                    'registerAs'=>'admin','status'=>'active',
                    'remember_token'=>'VFTk0iwzbwL2JHLZfyx8a7GvwYMnIEsA4z6t4W2lY2bwjMM8SHPXY6pxgkxN'),
                 );
            DB::table('users')->insert($users);
        }
    }
}
