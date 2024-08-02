<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $primaryKey = 'idtrips';

    protected $fillable = [
        'destinations_iddestinations', 'start_date', 'end_date', 'duration', 'cost_tabulators_idcost_tabulators', 'users_idusers'
    ];

    public function destination()
    {
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
