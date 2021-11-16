<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailManagement extends Mailable
{
    use Queueable, SerializesModels;

    protected $title;
    protected $text;
    protected $name;
    protected $email;
    protected $company_name;
    protected $select;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($text, $name, $email, $company_name, $select)
    {
        $this->title = sprintf('%sさん、ありがとうございます。', $name);
        $this->text = $text;
        $this->name = $name;
        $this->email = $email;
        $this->company_name = $company_name;
        $this->select = $select;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.management')
                    ->subject('管理者用確認メールです')
                    ->with([
                        'name' => $this->name,
                        'email' => $this->email,
                        'company_name' => $this->company_name,
                        'select' => $this->select,
                      ]);
    }
}
