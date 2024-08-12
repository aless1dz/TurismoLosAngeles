<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Associate extends Model{

    use HasFactory;
    
    protected $primaryKey = 'idassociates';

    protected $fillable = [
        'name', 'last_name', 'birthdate'
    ];
}