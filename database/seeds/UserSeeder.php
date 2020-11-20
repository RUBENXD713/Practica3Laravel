<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=> 'RUBENXD731',
            'email'=>'hernandezdiazruben@gmail.com',
            'password' => Hash::make('123456789'),
            'TipoUsuario'=>'admin',
            'persona'=>'1',
            'validacion'=>'si'
        ]);
        DB::table('users')->insert([
            'name'=> 'Dulce123',
            'email'=>'19170118@uttcampus.edu.mx',
            'password' => Hash::make('123456789'),
            'TipoUsuario'=>'user2',
            'persona'=>'2',
            'validacion'=>'si'
        ]);
        DB::table('users')->insert([
            'name'=> 'SolG123',
            'email'=>'19170157@uttcampus.edu.mx',
            'password' => Hash::make('123456789'),
            'TipoUsuario'=>'user2',
            'persona'=>'2',
            'validacion'=>'si'
        ]);

    }
}
