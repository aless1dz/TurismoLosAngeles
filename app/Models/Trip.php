<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $primaryKey = 'idtrips';
    
    protected $fillable = [
        'users_id',
        'assocaites_idassociates',
        'bus_seats',
        'start_date',
        'end_date',
        'duration',
        'cost_tabulators_idcost_tabulators',
        'contracts_idcontracts',
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

   
}
