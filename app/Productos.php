<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Productos extends Model
{
    use Notifiable, HasApiTokens;
    
    protected $table = "Productos";
    public $timetamps=false;
    public function Comentarios()
    {
        return $this->hasMany('App\Comentarioss');
        //un producto tiene muchos comentarios
    }
    public function personas()
    {
        return $this->hasOne('App\Pesonas');
        //un producto tiene una persona
    }
}
