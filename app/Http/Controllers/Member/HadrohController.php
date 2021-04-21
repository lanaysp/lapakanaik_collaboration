<?php

namespace App\Http\Controllers\Member;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HadrohController extends Controller
{
    public function tutorial(Request $request, $slug)
    {
        $category   = Category::where('slug', $slug)->first();
        $products = Product::with(['galleries'])->where('categories_id', $category->id)->paginate(32);

        return view('pages.member.dashboard-tutorial',[
            'category' => $category,
            'products' => $products
        ]);
    }

    public function sell(){

        $user = Auth::user();

        return view('pages.member.dashboard-sell', [
            'user' => $user
        ]);
    }
}
