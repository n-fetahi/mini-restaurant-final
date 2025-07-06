<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Traits\ApiResponses;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;

class ProductController extends Controller
{
     use ApiResponses;

    public function index()
    {
        $products = Product::latest()->paginate(12);
        return ProductResource::collection($products);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
        'name' => ['required','max:255'],
        'price' => ['required','gte:2'],
        'description' => ['required'],
        'image' => ['required', File::types(["png","jpg"])]
    ]);

    $imagePath = $request->image->store('products');


    Product::create([
        'name' => $request->name,
        'price' => $request->price,
        'description' => $request->description,
        "image" => '/storage/'.$imagePath
    ]);

    return $this->created('Added product successful');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {

        return new ProductResource($product);

    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        return $request->all();
        $request->validate([
            'name' => ['required','max:255'],
            'price' => ['required','gte:2'],
            'description' => ['required'],
            'image' => ['required', File::types(["png","jpg"])]
        ]);


        $imagePath = $request->image->store('products');


        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            "image" => '/storage/'.$imagePath
        ]);

        return $this->ok('Updated product successful');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return $this->ok('Deleted product successful');

    }
}
