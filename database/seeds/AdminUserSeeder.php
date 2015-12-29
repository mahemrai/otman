<?php

use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(array(
            'email'    => 'admin@otman.com',
            'password' => bcrypt('password'),
            'role'     => 'admin'
        ));
    }
}
