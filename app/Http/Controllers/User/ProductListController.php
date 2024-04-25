<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Brand;
use App\Models\Catergory;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductListController extends Controller
{
    public function index()
    {

        $products =  Product::with('category', 'brand', 'product_images');
        $filterProducts = $products -> filtered(0) -> paginate (20) -> withQueryString();

        $categories = Catergory::get();
        $brands = Brand::get();

        return Inertia::render(
            'User/ProductList',
            [
                'products' => ProductResource::collection($filterProducts),
                'brands' => $brands,
                'categories' => $categories
            ]

        );
    }
}
