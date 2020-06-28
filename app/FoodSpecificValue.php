<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FoodSpecificValue extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'specific_value',  'user_id','food_specific_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function FoodSpecific()
    {
        return $this->belongsTo('App\FoodSpecific');
    }
}
