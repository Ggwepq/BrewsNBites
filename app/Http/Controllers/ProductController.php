<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index(){
        $products = Product::get();
        return Inertia::render('Admin/Product/Index', ['products' => $products]);
    }
}
