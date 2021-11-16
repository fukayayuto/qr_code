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

class AccountController extends Controller
{
    public function index()
    {
        return view('/qrcode/index');
    }

    public function check_list_index()
    {
        return view('/qrcode/check_list');
    }

    public function check_list(Request $request)
    {
        $data = [];
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['company_name'] = $request->company_name;
        $data['select'] = $request->select;
        return view('/qrcode/check_list', compact('data'));
    }


    public function store(Request $request)
    {

        // 多重サブミットチェック
        if (!multiSubmitCheck($request)) {
            abort(409);
        }

        $data = [];
        $name = $request->name;
        $email = $request->email;
        $company_name = $request->company_name;
        $select = $request->select;
        $to = $email;
        $text = 'これからもよろしくお願いいたします。';
    
            
    
        $text = 'ユーザーが送信しました';
    
        Mail::to($to)->send(new MailCostomer($text, $name, $email, $company_name, $select));
          

        // 二重送信対策
        $request->session()->regenerateToken();

        // Mail::to($to)->send(new MailManagement($text, $name, $email, $company_name, $select));
    
        return redirect('/sent');
    }

    private function multiSubmitCheck(Request $request)
    {
        // Sessionオブジェクト(Store.php)
        $session = $request->session();
        // Sessionオブジェクトを最新化
        $session->start();
        // csrfトークンと画面パラメータのcsrfトークンの値が異なる場合エラー
        if ($session->token() != $request->input('_token')) {
            return false;
        }
        // csrfトークンの再生成
        // Store #regenerate によるセッションID再生成でもトークンの再生成が行われる
        $session->regenerateToken();
        // Sessionを保存
        $session->save();

        return true;
    }
}
