<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Khutbahcategory extends Model
{
    use SoftDeletes;

    protected $fillable =[
        'name', 'slug'
    ];

    protected $table = 'khutbahcategories';

    protected $hidden = [

    ];
}
