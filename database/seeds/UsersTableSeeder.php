<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'     => 'user demo',
            'email'    => 'user@demo.com',
            'password' => Hash::make('demo12345'),
            'is_admin' => false,
            'created_at' => now()
        ]);

        DB::table('users')->insert([
            'name'       => 'admin demo',
            'email'      => 'admin@demo.com',
            'password'   => Hash::make('demo12345'),
            'is_admin'   => true,
            'created_at' => now()
        ]);
    }
}
