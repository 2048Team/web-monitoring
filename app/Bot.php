<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bot extends Model
{
    protected $table='bots';
    protected $primaryKey = 'id'; // or null
    public $incrementing = false;
    protected $dateFormat = 'd-m-Y';
    public $timestamps = false;
    protected $fillable = ['title', 'address','action_day', 'investment','current', 'lat', 'lng','isActive', 'count'];
}
