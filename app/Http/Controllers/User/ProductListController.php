<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductListController extends Controller
{
    public function index()
    {

        $products =  Product::with('category', 'brand', 'product_images')->get();
        return Inertia::render(
            'User/ProductList',
            [
                'products' => $products
            ]

        );
    }
}
