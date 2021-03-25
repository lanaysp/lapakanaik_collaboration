<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;

class DashboardController extends Controller
{
    public function index()
    {
               $products = Product::with(['galleries','category'])
                        ->where('users_id',Auth::user()->id)->latest()->paginate(12);

        return view('pages.dashboard',[
            'products' => $products
        ]);
    }
}
