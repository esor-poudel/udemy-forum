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
                'name'=>'admin',
                'password'=>bcrypt('admin'),
                'email'=>'esor.poudel@gmail.com',
                'admin'=>1,
                'avatar'=>asset('avatars/avatar.jpg')
        ]);

        App\User::create([
            'name'=>'sachin',
            'password'=>bcrypt('admin'),
            'email'=>'sachin@gmail.com',
            'avatar'=>asset('avatars/avatar.jpg')
    ]);
    }
}
