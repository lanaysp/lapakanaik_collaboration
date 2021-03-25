<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use App\Sosial;
use App\Category;
use App\ProductGallery;
use Illuminate\Support\Facades\Auth;

class DetailController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request, $id)
    {
        $categories     = Category::all();
         $product = Product::with(['galleries','user.provinsi','user.kota'])->where('slug', $id)->firstOrFail();
         $lainya = Product::with(['galleries'])->take(2)->get();
         $random = Product::with(['galleries'])->inRandomOrder()->take(5)->get();
         $more = Product::with(['galleries'])->take(4)->latest()->get();
         $sosials = Sosial::all();

        return view('pages.detail',[
            'categories' => $categories,
            'random' => $random,
            'product' => $product,
            'medsos' => $sosials,
            'lainya' => $lainya,
            'more' => $more
        ]);
    }

    // public function add(Request $request, $id)
    // {
    //     $data = [
    //         'products_id' => $id,
    //         'users_id' => Auth::user()->id,
    //     ];

    //     Cart::create($data);

    //     return redirect()->route('cart');
    // }
}
