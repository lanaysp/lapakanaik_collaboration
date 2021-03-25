<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\CategoriesProduct;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\ProductRequest;
use App\ProductGallery;
use App\User;

class DashboardProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['galleries','category'])
                        ->where('users_id', '!=', 1)
                        ->latest()->paginate(24);

        return view('pages.dashboard-products',[
            'products' => $products
        ]);
    }

   public function details(Request $request, $id)
    {
        $product = Product::with((['galleries','user']))->findOrFail($id);
        $categories = Category::all();
        $user = User::all();

        return view('pages.dashboard-products-details',[
            'product' => $product,
            'categories' => $categories,
            'user' => $user
        ]);
    }

    public function uploadGallery(Request $request)
    {
        $data = $request->all();

        $data['photos'] = $request->file('photos')->store('assets/product','public');

        ProductGallery::create($data);

        return redirect()->route('dashboard-product-details', $request->products_id);
    }

    public function deleteGallery(Request $request, $id)
    {
        $item = ProductGallery::findOrFail($id);
        $item->delete();

        return redirect()->route('dashboard-product-details', $item->products_id);
    }

    public function create()
    {
        $categories = Category::all();
        $user = User::all();
        return view('pages.dashboard-products-create',[
            'categories' => $categories,
            'user' => $user
        ], compact('categories'));
    }

    public function store(ProductRequest $request)
    {

        $data = $request->all();
        

        $data['slug']   = Str::slug($request->slug);
        $categories_id  = $data['categories_id'];
        unset($data['categories_id']);

        $product = Product::create($data);



        $gallery = [
            'products_id' => $product->id,
            'photos' => $request->file('photo')->store('assets/product','public')
        ];

        ProductGallery::create($gallery);

//nih dah bener
          foreach($categories_id as $item)
    {

            CategoriesProduct::create(
            ['product_id' => $product->id,'categories_id' => $item]
        );
    }
        return redirect()->route('dashboard-product');

    }

    public function update(ProductRequest $request, $id)
    {
        $data = $request->all();

        $item = Product::findOrFail($id);

        $data['slug'] = Str::slug($request->slug);
        $categories_id  = $data['categories_id'];
        unset($data['categories_id']);

        $item->update($data);
        CategoriesProduct::where('product_id', $item->id)->delete();
         foreach($categories_id as $c)
    {
            CategoriesProduct::create(['product_id' => $item->id,'categories_id' => $c]);
    }

        return redirect()->route('product.index');
    }
}
