<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Animal extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',  'user_id','age','wight','child_n','child_m','dogum','gebelik','animal_food_type_id',
        'animal_type_id','animal_family_id','animal_motion_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function AnimalFamily()
    {
        return $this->belongsTo('App\AnimalFamily');
    }

    public function AnimalFoodType()
    {
        return $this->belongsTo('App\AnimalFoodType');
    }

    public function AnimalMotion()
    {
        return $this->belongsTo('App\AnimalMotion');
    }

    public function AnimalType()
    {
        return $this->belongsTo('App\AnimalType');
    }
    public function AnimalNeed()
    {
        return $this->hasMany('App\AnimalNeed');
    }
}
