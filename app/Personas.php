<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Personas extends Model
{
    use Notifiable, HasApiTokens;
    
    protected $table = "Personas";
    public $timetamps=false;

    public function Comentarios()
    {
        return $this->hasMany('App\Comentarioss');
        //una persona tiene muchos comentarios
    }
}
