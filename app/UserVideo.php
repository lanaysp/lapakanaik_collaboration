<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserVideo extends Model
{

    protected $fillable = [
        'judul', 'link',  'hp', 'photo', 'deskripsi'
    ];
    protected $table ="videousers";

    protected $hidden = [];
}
