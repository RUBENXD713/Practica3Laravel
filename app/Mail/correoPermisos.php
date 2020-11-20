<?php

namespace App\Mail;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class correoPermisos extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
       
        //Log::info("Construct",$user->name);
        $this->user=$user;
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

        return $this->view('socitarPermisos')->from($this->user->email);
    }
}
