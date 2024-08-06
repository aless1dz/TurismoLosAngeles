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


<<<<<<< HEAD

    public function trips()
    {
        return $this->hasMany(Trip::class, 'trips_idtrips', 'idtrips');
=======
 /**
     * Definición de la relación con el modelo `Trip`.
     * Un tabulador de costos puede ser utilizado en muchos viajes.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function trips()
    {
        return $this->hasMany(Trip::class);
>>>>>>> 180dae9d5b61f2d3d134cace068243052493d5bd
    }
    
}
