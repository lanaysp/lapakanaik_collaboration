<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoriesProduct extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'product_id', 'categories_id'
    ];
     protected $table ='categories_product';

    protected $hidden = [];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_id', 'id');
    }

    public function categoriproduct()
    {
        return $this->belongsTo(CategoriesProduct::class, 'categories_id', 'product_id', 'id');
    }
}
