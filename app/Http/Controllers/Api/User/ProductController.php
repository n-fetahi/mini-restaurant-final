<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
        public function index()
    {
        $products = Product::paginate(3);
        return ProductResource::collection($products);
    }



    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return new ProductResource($product);

    }
}
