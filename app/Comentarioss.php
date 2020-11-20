<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Comentarioss extends Model
{
    use Notifiable, HasApiTokens;
    
    protected $table = "Comentarios";
    public $timetamps=false;

    public function Personas()
    {
        return $this->belongTo('App\Personas');
        //muchos comentario tienen una persona
    }
    public function productos()
    {
        return $this->belongTo('App\Productos');
        //muchos comentario tiene un producto
    }
}
