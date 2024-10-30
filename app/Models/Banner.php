<?php



namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;



class Banner extends Model

{

    use HasFactory;

    protected $table = 'banner';

    protected $primaryKey = 'banner_id';

    protected $fillable = [



        'banner_name', 

        'mobile_image', 

        'banner_link',

        'banner_sub_heading',
        'desktop_image',
       
        'banner_desc'



   ];

}

