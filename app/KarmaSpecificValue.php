<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KarmaSpecificValue extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'karma_id',  'Enerji', 'Km', 'Hp', 'Lif', 'Kul', 'Karbonhidrat', 'Kalsiyum',
        'Fosfor', 'Ca_p', 'Meganizyum', 'Sodyum', 'Taurin', 'Yag', 'LinoliekAsit', 'Fiyat'
    ];

    public function Karma()
    {
        return $this->belongsTo('App\Karma');
    }
}
