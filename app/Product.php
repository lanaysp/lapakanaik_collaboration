<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravelista\Comments\Commentable;

class Product extends Model
{

    use Commentable;


     protected $fillable = [
        'name', 'users_id', 'categories_id', 'price', 'description', 'slug' , 'users_id', 'wa_majelis'
    ];

    protected $hidden = [

    ];

    public function galleries()
    {
        return $this->hasMany(ProductGallery::class, 'products_id', 'id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'users_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_id', 'id');
    }

    public function categories() {
        return $this->hasMany(CategoriesProduct::class, 'product_id');
    }


}
