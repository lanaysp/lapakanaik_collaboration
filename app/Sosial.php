<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sosial extends Model
{
    use SoftDeletes;

    protected $fillable =[
        'cs', 'email', 'ig', 'fb', 'yt', 'alamat', 'hp', 'tw', 'tt'
    ];

    protected $table ="sosmeds";

    protected $hidden = [

    ];
}
