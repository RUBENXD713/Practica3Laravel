<?php

namespace App\Mail;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class correoPermisosPU extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //Log::info("Build",$this->user);
       // return $this->from($this->user->email)
        //->view('socitarPermisos');

        return $this->view('SolicitarPermisosPU')->from('19170045@uttcampus.edu.mx');
    }
}
