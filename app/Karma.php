<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Karma extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',  'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function KarmaFood()
    {
        return $this->hasMany('App\KarmaFood', 'karma_id', 'id');
    }
    public function KarmaSpecificValue()
    {
        return $this->hasMany('App\KarmaSpecificValue');
    }

}
