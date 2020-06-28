<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name', 'adress', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
