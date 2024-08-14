<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $primaryKey = 'idtrips';
    
    protected $fillable = [
        'destinations_iddestinations',
        'users_id',
        'associates_idassociates',
        'cost_tabulators_idcost_tabulators',
        'bus_seats',
        'telephone_number',
        'payment_advance',
        'total',
        'observations',
    ];

    public function destination()
    {
        return $this->belongsTo(Destination::class, 'destinations_iddestinations');
    }

    public function costTabulator()
    {
        return $this->belongsTo(Cost_Tabulator::class, 'cost_tabulators_idcost_tabulators');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function associate()
    {
        return $this->belongsTo(Associate::class, 'associates_idassociates');
    }

       // Trip.php
public function associates()
{
    return $this->belongsToMany(Associate::class, 'trip_associate', 'trips_idtrips', 'associates_idassociates');
}
}
