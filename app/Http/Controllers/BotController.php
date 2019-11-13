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

    function fetch_data(Request $request)
    {
        if($request->ajax())
        {
            $data = Bot::paginate(10);
            return view('bots.pagination_data', compact('data'))->render();
        }
    }
}
