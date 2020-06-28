<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AnimalFamily extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',  'user_id','min','max','average','body','age','boy','girl'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
