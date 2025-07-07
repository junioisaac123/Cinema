<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PurchaseConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $show;
    public $seats;

    public function __construct($user, $show, $seats)
    {
        $this->user = $user;
        $this->show = $show;
        $this->seats = $seats;
    }

    public function build()
    {
        return $this->subject('Confirmación de Compra - ' . config('app.name'))
                    ->markdown('emails.purchase_confirmation');
    }
}

