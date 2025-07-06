<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
       public function index()
    {
        $latestProducts = Product::latest()->take(6)->get();
        return view('user.home', compact('latestProducts'));
    }
}
