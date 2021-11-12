<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entry;
use App\Models\ReservationSetting;
use Illuminate\Support\Facades\Auth;
use App\Models\Account;
use App\Models\Information;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        //ログイン情報
        if (empty(Auth::user())) {
            return redirect('/login');
        }
        $user = Auth::user();

        //予約情報表示
        $entry = new Entry();
        $reservation = new ReservationSetting();
        $entry_data = $entry->userSelectEntry($user->id);

        $data = [];

        foreach ($entry_data as $k => $val) {
            $tmp = [];
            $reservation_data = $reservation->userSelectReservation($val['reservation_id']);
            $tmp['start_date'] = $reservation_data->start_date;
            $tmp['progress'] = $reservation_data->progress;
            $tmp['place'] = $reservation_data->place;
            $tmp['count'] = $val['count'];
            $tmp['entry_id'] = $val['id'];
            $data[$k] = $tmp;
        }

        //インフォメーション
        $information = new Information();
        $information_data = $information->getData();

        return view('/dashboard', compact('data', 'user', 'information_data'));
    }

    public function reservation_detail($id)
    {
        $entry = new Entry();
        $data = $entry->selectEntry($id);

        $reservation = new ReservationSetting();
        $reservation_data = $reservation->userSelectReservation($data->reservation_id);
        $start_date = $reservation_data->start_date;
        $progress = (int) $reservation_data->progress;
        $s_date = new Carbon($start_date);
        $end_date= $s_date->addDays($progress)->format('Y-m-d');
        return view('/reservation/detail',compact('data'))->with('start_date',$start_date)->with('end_date',$end_date);
    }
}
