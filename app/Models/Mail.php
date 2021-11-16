<?php

namespace App\Models;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Mail extends Mailable
{
    use Queueable, SerializesModels;

    public $mail_text;
    public $name;
    public $company_name;
    public $email;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mail_text, $name, $company_name, $email)
    {
        $this->mail_text = $mail_text;
        $this->name = $name;
        $this->company_name = $company_name;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('e-learning@example.com')
                    ->view('emails.customer')
                    ->subject('登録完了');
    }
}
