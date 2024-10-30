<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    use HasFactory;
    protected $table = 'inquirey';
    protected $primaryKey = 'id';
    protected $fillable = [
        'full_name',
        'phone_number', 
        'email', 
        'city',
        'message',
        'state',
        'country',
        
        
   ];
}
