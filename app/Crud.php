<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Crud extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'web_page', 'description', 'title', 'image'
    ];
}
