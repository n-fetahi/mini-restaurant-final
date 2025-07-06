<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->paginate(12);
        // dd($products);
        return view('user.products.index', compact('products'));
    }



    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('user.products.show', compact('product'));

    }


}
