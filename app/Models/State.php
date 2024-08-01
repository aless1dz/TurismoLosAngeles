<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    protected $primaryKey = 'idstates';

    protected $fillable = [
        'name'
    ];

    public function cities()
    {
        return $this->hasMany(City::class, 'states_idstates', 'idstates');
    }

    public function destinations()
    {
        return $this->hasMany(Destination::class, 'states_idstates', 'idstates');
    }
}
