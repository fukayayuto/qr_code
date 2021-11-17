<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Carbon\Carbon;

class MailManagement extends Mailable
{
    use Queueable, SerializesModels;

    protected $title;
    protected $text;
    protected $name;
    protected $name_kana;
    protected $email;
    protected $company_name;
    protected $date;
    protected $send_time;

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
        $now = new Carbon();
        $this->send_time = $now->format('m月d日 H時i分');
        // $this->send_time = $now->format('Y年m月d日 H時i分');
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
                        'name_kana' => $this->name_kana,
                        'email' => $this->email,
                        'company_name' => $this->company_name,
                        'date' => $this->date,
                        'send_time' => $this->send_time,
                      ]);
    }

    public function failed(Throwable $exception)
    {
        // 失敗の通知をユーザーへ送るなど…
    }
}
