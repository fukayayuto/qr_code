<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailCostomer extends Mailable
{
    use Queueable, SerializesModels;

    protected $title;
    protected $text;
    protected $name;
    protected $name_kana;
    protected $email;
    protected $company_name;
    protected $date;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $name_kana, $email, $company_name, $date)
    {
        // $this->title = sprintf('%sさん、ありがとうございます。', $name);
        $this->name = $name;
        $this->name_kana = $name_kana;
        $this->email = $email;
        $this->company_name = $company_name;
        $this->date = $date;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.costomer')
                    ->subject('確認メールです(顧客用)')
                    ->with([
                        'name' => $this->name,
                        'name_kana' => $this->name_kana,
                        'email' => $this->email,
                        'company_name' => $this->company_name,
                        'date' => $this->date,
                      ]);
    }
}
