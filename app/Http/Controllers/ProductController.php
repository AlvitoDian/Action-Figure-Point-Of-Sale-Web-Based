<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('pages.stock', [
            "products" => Product::all()
        ]);
    }

    public function show($slug)
    {
        return view('product-detail', [
            "product" => Product::find($slug)
        ]);
    }
}
