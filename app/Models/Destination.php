<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;

    protected $primaryKey = 'iddestinations';

    protected $fillable = [
        'cities_idcities', 'states_idstates'
    ];

    public function city()
    {
        return $this->belongsTo(City::class, 'cities_idcities', 'idcities');
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'states_idstates', 'idstates');
    }

    public function cost_tabulators()
    {
        return $this->hasMany(Cost_Tabulator::class, 'destinations_iddestinations', 'iddestinations');
    }
}
