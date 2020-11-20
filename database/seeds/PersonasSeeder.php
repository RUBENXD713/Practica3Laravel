<?php

use Illuminate\Database\Seeder;

class PersonasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('personas')->insert([
            'Nombre'=> 'Ruben Hernandez Diaz'
        ]);
        DB::table('personas')->insert([
            'Nombre'=> 'Dulce Jazmin Antunez Rios'
        ]);
        DB::table('personas')->insert([
            'Nombre'=> 'Angelica Marisol Garcia Gonzales'
        ]);

        $personas = factory(App\Personas::class, 5)->create();
    }
}
