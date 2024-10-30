<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    protected $table = 'pages';
    protected $primaryKey = 'pg_id';
    protected $fillable = [
        'pg_name',
        'slug', 
        'shrt_desc', 
        'full_desc',
   ];
}
