<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;

    protected $primaryKey = 'iddestinations';

    protected $fillable = [
        'destination_acronym', 'cities_idcities', 'states_idstates'
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

<<<<<<< HEAD
    public function trips()
    {
        return $this->hasMany(Trip::class, 'trips_idtrips', 'idtrips');
=======
    /**
     * Definición de la relación con el modelo `Trip`.
     * Un destino puede estar asociado con muchos viajes.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function trips()
    {
        return $this->hasMany(Trip::class);
>>>>>>> 180dae9d5b61f2d3d134cace068243052493d5bd
    }
}

