<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Food extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',  'user_id','food_group_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function FoodGroup()
    {
        return $this->belongsTo('App\FoodGroup');
    }

    public function Relation()
    {
        return $this->hasMany('App\FoodRelation');
    }

    public function KarmaFood()
    {
        return $this->belongsTo('App\KarmaFood', 'food_id', 'id');
    }
}
