<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use Illuminate\Mail\Mailable;
use App\Mail\MailTest;

use Illuminate\Support\Facades\Mail;
use App\Mail\SampleNotification;
use App\Mail\MailCostomer;
use App\Mail\MailManagement;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    public function index()
    {
        return view('/qrcode/index');
    }

    public function check_list_index()
    {
        return view('/qrcode/index');
    }

    public function check_list(Request $request)
    {
        $rulus = [
            'email' => 'email',
            'name_kana' => 'regex:/\A[ァ-ヴー]+\z/u'
          ];
        
        $message = [
            'email.email' => 'メールアドレスは正しい形式で入力してください',
            'name_kana.regex' => '氏名(カナ)は全角カナで入力してください'
          ];

        $validate = Validator::make($request->all(), $rulus, $message);

    
        if ($validate->fails()) {
            return redirect()->route("qr_form")->withErrors($validate->messages());
        }
        
        $data = [];
        $data['name'] = $request->name;
        $data['name_kana'] = $request->name_kana;
        $data['email'] = $request->email;
        $data['company_name'] = $request->company_name;
        if ($request->select_date == 1) {
            $data['select_date'] = '１１月３０日（火）１３：００～１４：３０';
            $data['select'] = 1;
        } else {
            $data['select_date'] = '１２月１日（水）１５：３０～１７：００';
            $data['select'] = 1;
        }

        // 二重送信対策
        $request->session()->regenerateToken();
        
        return view('/qrcode/check_list', compact('data'));
    }


    public function store(Request $request)
    {
        $data = [];
        $name = $request->name;
        $name_kana = $request->name_kana;
        $email = $request->email;
        $company_name = $request->company_name;
        $select = $request->select;
        if ($select == 1) {
            $date = '１１月３０日（火）１３：００～１４：３０';
        } else {
            $date = '１２月１日（水）１５：３０～１７：００';
        }
        $to = $email;
            
    
        // 二重送信対策
        $request->session()->regenerateToken();

        Mail::to($to)->send(new MailCostomer($name, $name_kana, $email, $company_name, $date));
          
        $to = 'takemori@example.co.jp';
        Mail::to($to)->send(new MailManagement($name, $name_kana, $email, $company_name, $date));
    
        return view('/qrcode/sent')->with('email', $email);
    }
}
