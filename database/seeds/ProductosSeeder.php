<?php

use Illuminate\Database\Seeder;

class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('productos')->insert([
            'Nombre'=> 'Mac',
            'persona'=>1
        ]);
        DB::table('productos')->insert([
            'Nombre'=> 'Skate futurista',
            'persona'=>1
        ]);
        DB::table('productos')->insert([
            'Nombre'=> 'Carro',
            'persona'=>1
        ]);
        DB::table('productos')->insert([
            'Nombre'=> 'Pc Gamer',
            'persona'=>2
        ]);
        DB::table('productos')->insert([
            'Nombre'=> 'Cellphone',
            'persona'=>3 
        ]);
        DB::table('productos')->insert([
            'Nombre'=> 'Iphone',
            'persona'=>1
        ]);
         DB::table('productos')->insert([
            'Nombre'=> 'Huawei',
            'persona'=>3
        ]);
        DB::table('productos')->insert([
            'Nombre'=> 'MinePoke',
            'persona'=>2
        ]);   

        $producto = factory(App\Productos::class, 5)->create();
    }
}
