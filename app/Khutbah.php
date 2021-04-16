<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Laravelista\Comments\Commentable;

class Khutbah extends Model
{
    use SoftDeletes,Commentable;

    protected $fillable = [
        'judul', 'users_id', 'khutbahcategories_id', 'photo', 'description', 'slug', 'sumber'
    ];

    protected $table = 'khutbah';

    protected $hidden = [

    ];

    public function khutbahcategories(){
        return $this->belongsTo( Khutbahcategory::class, 'khutbahcategories_id', 'id');
    }

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])
        ->translatedFormat('d F Y');
    }
}
