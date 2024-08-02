<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cost_Tabulator extends Model
{
    use HasFactory;

    protected $table = 'cost_tabulators';
    protected $primaryKey = 'idcost_tabulators';

    protected $fillable = [
        'destinations_iddestinations', 'unit_price', 'bulk_price', 'description'
    ];

    public function destination()
{
    return $this->belongsTo(Destination::class, 'destinations_iddestinations');
}



    public function trips()
    {
        return $this->hasMany(Trip::class, 'trips_idtrips', 'idtrips');
    }
    
}
