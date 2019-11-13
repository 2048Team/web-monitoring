<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table='tranlogs';
    protected $primaryKey = 'id'; // or null
    public $incrementing = false;
    protected $dateFormat = 'y-m-d H:i:s';
    public $timestamps = false;
    protected $fillable = ['id','plate_id', 'time','type', 'money','bot_station_id', 'txs'];

    public function bot()
    {
        return $this->hasOne(Bot::class, 'id', 'bot_station_id');
    }
}
