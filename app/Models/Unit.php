<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;
    
    protected $table = 'units';
    protected $primaryKey = 'idunits'; 
    
    protected $fillable = [
        'model', 'manufacturer', 'plates', 'place', 'full_space'
    ];
}
