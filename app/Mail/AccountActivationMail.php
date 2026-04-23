<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class AccountActivationMail extends Mailable
{
    public $user;
    public $username;
    public $password;

    public function __construct($user, $username, $password)
    {
        $this->user = $user;
        $this->username = $username;
        $this->password = $password;
    }

    public function build()
    {
        return $this->subject('Account Activation - Officeles Cloud')
            ->view('pages.mail-template');
    }
}