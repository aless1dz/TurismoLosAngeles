<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;
    
<<<<<<< HEAD
    protected $table = 'units';
    protected $primaryKey = 'idunits'; 
    
=======
    protected $primaryKey = 'idunits';

>>>>>>> 180dae9d5b61f2d3d134cace068243052493d5bd
    protected $fillable = [
        'model', 'manufacturer', 'plates', 'place', 'full_space'
    ];
}
