<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $primaryKey = 'idtrips';
<<<<<<< HEAD

    protected $fillable = [
        'destinations_iddestinations', 'start_date', 'end_date', 'duration', 'cost_tabulators_idcost_tabulators', 'users_idusers'
=======
    
    protected $fillable = [
        'destinations_iddestinations',
        'start_date',
        'end_date',
        'duration',
        'cost_tabulators_idcost_tabulators',
        'users_id',
        'contracts_idcontracts',
>>>>>>> 180dae9d5b61f2d3d134cace068243052493d5bd
    ];

    public function destination()
    {
<<<<<<< HEAD
        return $this->belongsTo(Destination::class, 'destination_iddestinations', 'iddestinations');
    }
    public function cost_tabulator()
    {
        return $this->belongsTo(Cost_Tabulator::class, 'cost_tabulators_idcost_tabulators', 'idcost_tabulators');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'users_idusers', 'idusers');
    }

    
} 
=======
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

    public function contract()
    {
        return $this->belongsTo(Contract::class, 'contracts_idcontracts');
    }
}
>>>>>>> 180dae9d5b61f2d3d134cace068243052493d5bd
