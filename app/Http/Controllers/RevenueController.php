<?php

namespace App\Http\Controllers;

use App\Bot;
use App\Transaction;
use Illuminate\Http\Request;

class RevenueController extends Controller
{
    function index($id)
    {
        $data = Transaction::Where('bot_station_id', $id)->orderBy('time','DESC')->paginate(10);
        $bot = Bot::Where('id',$id)->first();
//        $data = Bot::paginate(10);
//        return view('bots.list', compact('data'));
        return view('revenue.overview',['bot'=>$bot, 'data'=>$data]);
    }

    function getCurrentTrasaction($id)
    {
            $data = Transaction::Where('bot_station_id', $id  )->orderBy('time','DESC')->paginate(10);
            return view('revenue.table', ['data'=>$data]);
    }

}
