<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserVideoRequest;

use App\Category;
use App\Banner;
use App\Product;
use App\Sosial;
use App\Suport;
use App\User;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sosials = Sosial::all();
        $banners = Banner::get();
        $suports = Suport::get();
        $categories = Category::get();
        $user = User::all();
        $products = Product::with(['galleries'])->take(8)->latest()->get();
        return view('pages.home',[
            'medsos' => $sosials,
            'banners' => $banners,
            'suports' => $suports,
            'categories' => $categories,
            'products' => $products,
            'user' => $user
        ]);

    }
     public function panduan()
    {
        $sosials = Sosial::all();
        $banners = Banner::get();
        $suports = Suport::get();
        $categories = Category::get();
        $products = Product::with(['galleries'])->take(8)->latest()->get();
        return view('pages.panduan',[
            'medsos' => $sosials,
            'banners' => $banners,
            'suports' => $suports,
            'categories' => $categories,
            'products' => $products
        ]);
    }
    
}
