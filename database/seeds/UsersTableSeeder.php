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
        $user = App\User::create([
        	'name' => 'Christopher Foster',
        	'email' => 'chris@fuzebyte.com',
        	'password' => bcrypt('password'),
            'admin' => 1
        ]);
        App\Profile::create([
            'user_id' => $user->id,
            'avatar' => 'uploads/avatars/1.JPG',
            'about' => 'My name is Chris, and I am an accomplished and highly skilled web developer driven by satisfied clients. And I have been privileged to have many as CEO of FuzeByte LLC.',
            'facebook' => 'facebook.com',
            'youtube' => 'youtube.com'
        ]);
    }
}
