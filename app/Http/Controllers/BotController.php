<?php

namespace App\Http\Controllers;

use App\Bot;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BotController extends Controller
{
    function index()
    {
        $data = Bot::paginate(10);
        return view('bots.list', compact('data'));
    }

    function getBots(Request $request)
    {
        if($request->ajax())
        {
            $data = Bot::paginate(10);
            return view('bots.table', compact('data'))->render();
        }
    }

    function show($id){
            $bot = Bot::Where('id', $id)->firstOrFail();
            return view('bots.detail', ['bot'=>$bot]);
    }
}
