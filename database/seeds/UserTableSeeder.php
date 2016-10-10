<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            [
                'name' 		=> 'Admin',
                'last_name' => 'V-Code',
                'email' 	=> 'admin@vcode.com',
                'user' 		=> 'admin',
                'password' 	=> \Hash::make('123456'),
                'type' 		=> 'admin',
                'active' 	=> 1,
                'address' 	=> 'Tecamac',
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],
            [
                'name' 		=> 'Usuario',
                'last_name' => 'User',
                'email' 	=> 'user@gmail.com',
                'user' 		=> 'usuario',
                'password' 	=> \Hash::make('123456'),
                'type' 		=> 'user',
                'active' 	=> 1,
                'address' 	=> 'Tecamac',
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],

        );

        User::insert($data);
    }
}
