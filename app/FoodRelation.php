<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FoodRelation extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'food_id','specific_value', 'food_specific_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function Food()
    {
        return $this->belongsTo('App\Food');
    }

    public function FoodSpecific()
    {
        return $this->belongsTo('App\FoodSpecific');
    }
}
