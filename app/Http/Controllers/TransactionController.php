<?php

namespace App\Http\Controllers;

use App\Events\AddTransactionEvent;
use App\Transaction;
use App\Bot;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TransactionController extends Controller
{
    function index()
    {
        $data = Transaction::paginate(10);
        return view('transactions.all', compact('data'));
    }

    protected function create(array $data)
    {
        return Transaction::create([
            'plate_id' => $data['plate_id'],
            'type' => $data['type'],
            'money' =>$data['money'],
            'time'=>$data['time'],
            'bot_station_id'=>$data['bot_station_id'],
            'txs'=>$data['txs'],
            'time'=> date('y-m-d H:i:s', strtotime($data['time']))
        ]);
    }

    function  add(Request $request){
        $allRequest  = $request->all();
        $result = $this->create($allRequest);
        $bot_id = $request->bot_station_id;
        $money = floatval($request->money);

        if( $result) {

            $id = Transaction::where('txs', $result->txs)->first()->id;
            // Insert thành công sẽ hiển thị thông báo
            $bot = Bot::Where('id',$bot_id)->first();
            $bot->current = $bot->current + $money;
            $bot->count ++;
            $bot->save();
            event(new AddTransactionEvent($id, $bot->count, $bot->current));
            return response()->json([
                'transaction_id' => $id
            ], 200); // Status code here
        } else {
            // Insert thất bại sẽ hiển thị thông báo lỗi
            return response()->json([], 500); // Status code here
        }
    }

    function detail($transaction_id)
    {
        $data = Transaction::Where('id', $transaction_id)->firstOrFail();

        return view('transactions.detail', ['transaction'=>$data]);
    }
    function fetch_data(Request $request)
    {
        if($request->ajax())
        {
            $data = Transaction::paginate(10);
            return view('transactions.pagination_data', compact('data'))->render();
        }
    }

    function search(Request $request)
    {
        $keyword = $request->keyword;
        $count = strlen($keyword); // 6
        $data=null;

        if ($count<15){
            $data=Transaction::Where('plate_id', $keyword)->paginate(10);;
        }
        if ($count==36){
            $data=Transaction::Where('id', $keyword)->orWhere('bot_station_id', $keyword)->paginate(10);;
        }
        if ($count==66){
            $data=Transaction::Where('txs', $keyword)->paginate(10);;
        }

        return view('transactions.result',compact('data', $data),['keyword'=>$keyword]) ->render();
    }
}
