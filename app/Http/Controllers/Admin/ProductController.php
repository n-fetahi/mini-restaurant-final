<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->paginate(12);
        return view('admin.products.index',['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.products.create');
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

    return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {

        return view('admin.products.show', ['product'=>$product]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit', ['product'=>$product]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
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
            "image" => $imagePath
        ]);

        return redirect()->route('admin.products.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index');

    }
}
