<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Solution extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',  'user_id', 'karma_id','animal_id',

        'EnerjiSonuc', 'KmSonuc', 'HpSonuc', 'LifSonuc', 'KulSonuc', 'KarbonhidratSonuc', 'KalsiyumSonuc','FosforSonuc',
        'Ca_pSonuc', 'MeganizyumSonuc', 'SodyumSonuc', 'TaurinSonuc', 'YagSonuc', 'LinoliekAsitSonuc',

        'EnerjiPercent', 'KmPercent', 'HpPercent', 'LifPercent', 'KulPercent', 'KarbonhidratPercent', 'KalsiyumPercent',
        'FosforPercent', 'Ca_pPercent', 'MeganizyumPercent', 'SodyumPercent', 'TaurinPercent', 'YagPercent', 'LinoliekAsitPercent',

        'EnerjiKM', 'KmKM', 'HpKM', 'LifKM', 'KulKM', 'KarbonhidratKM', 'KalsiyumKM',
        'FosforKM', 'Ca_pKM', 'MeganizyumKM', 'SodyumKM', 'TaurinKM', 'YagKM', 'LinoliekAsitKM',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function Karma()
    {
        return $this->belongsTo('App\Karma');
    }

    public function Animal()
    {
        return $this->belongsTo('App\Animal');
    }
}
