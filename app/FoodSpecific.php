<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FoodSpecific extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',  'user_id','food_unit_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function FoodUnit()
    {
        return $this->belongsTo('App\FoodUnit');
    }
}
