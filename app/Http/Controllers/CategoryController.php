<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Product;
use App\Sosial;
use App\CategoriesProduct;

class CategoryController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sosials = Sosial::all();
        $categories = Category::get();
        $products = Product::with(['galleries'])->paginate(12);

        return view('pages.category',[
            'medsos' => $sosials,
            'categories' => $categories,
            'products' => $products
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function detail(Request $request, $slug)
    {
        $category   = Category::where('slug', $slug)->first();
        if(!$category) {
            // kosong
        }
       $sosials = Sosial::all();
       $categories = Category::all();
       $pc = CategoriesProduct::where('categories_id', $category->id)->select('product_id')
        ->get()->pluck('product_id')->toArray();//saya remind dulu yah mas, nnti kalau datanya baanyak ini bakal jadi masalah
        $products = Product::whereIn('id', $pc)->get();

        return view('pages.category',[
            'category' => $category,
            'categories' => $categories,
            'products' => $products,
            'medsos' => $sosials
        ]);
    }
    public function cari(Request $request)
    {
        $cari = $request->cari;

        $sosials = Sosial::all();
        $products = Product::with(['galleries'])
                    ->where('name', 'like', "%".$cari."%")
                    ->latest()
                    ->paginate(24);

        $categories = Category::all();
        $categories_new = Category::take(48)->latest()->get();


        return view('pages.category',[
            'categories' => $categories,
            'categories_new' => $categories_new,
            'products' => $products,
            'medsos' => $sosials
        ]);
    }
}
