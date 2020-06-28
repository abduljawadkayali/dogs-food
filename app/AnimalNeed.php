<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AnimalNeed extends Model
{
    use SoftDeletes;
    protected $fillable = [
         'animal_id',  'Enerji', 'Km', 'Hp', 'Lif', 'Kul', 'Karbonhidrat', 'Kalsiyum',
        'Fosfor', 'Ca_p', 'Meganizyum', 'Sodyum', 'Taurin', 'Yag', 'LinoliekAsit'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function Animal()
    {
        return $this->belongsTo('App\Animal');
    }
}
