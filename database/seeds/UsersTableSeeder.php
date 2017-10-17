<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
        	'name' => 'Christopher Foster',
        	'email' => 'chris@fuzebyte.com',
        	'password' => bcrypt('password')
        ]);
    }
}
