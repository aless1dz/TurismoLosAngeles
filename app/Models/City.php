<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $primaryKey = 'idcities';

    protected $fillable = [
        'name', 'states_idstates'
    ];

    public function state()
    {
        return $this->belongsTo(State::class, 'states_idstates', 'idstates');
    }

    public function destinations()
    {
        return $this->hasMany(Destination::class, 'cities_idcities', 'idcities');
    }
}
