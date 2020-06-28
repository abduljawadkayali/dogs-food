<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KarmaFood extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'food_amount','food_id','karma_id'
    ];

    public function Food()
    {
        return $this->belongsTo('App\Food');
    }

    public function Karma()
    {
        return $this->belongsTo('App\Karma');
    }
}
