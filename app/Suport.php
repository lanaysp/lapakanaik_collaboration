<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Suport extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'photo'
    ];
    protected $table ="suport";

    protected $hidden = [];
}
