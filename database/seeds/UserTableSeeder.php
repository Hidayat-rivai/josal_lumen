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
        DB::table('users')->insert(
            ['username' => 'Jack','email' => 'jack@gmail.com','password' => Hash::make('123456'),'nomor_hp'=>'0812','status'=> 0,'role'=>1]
        );
    }
}
