<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formality extends Model
{
    use HasFactory;

    
    protected $table = 'formalities';

    
    protected $fillable = [
        'user_id',
        'user_name',
        'user_email',
        'type_transport',
        'user_date',
        'user_pasajeros',
        'form_type', 
        'type_visa',
        'user_adult',
        'user_kid',
        'user_whatsapp',
        'user_destino',
        'message',
    ];

    
   
}
