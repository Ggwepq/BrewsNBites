<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Catergory;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(){
        $products = Product::with('category', 'brand', 'product_images')->get();
        $brands = Brand::get();
        $categories = Catergory::get();

        return Inertia::render('Admin/Product/Index', ['products' => $products, 
            'brands' => $brands, 
            'categories' => $categories
        ]);
    }

    public function store(Request $request){
        // dd($request->file('product_images'));
        // Add new items to db
        $product = new Product();
        $product->title = $request->title;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->save();

        //check if product has uploaded image
        if ($request->hasFile('product_images')){
            $productImages = $request->file('product_images');
            foreach ($productImages as $image){

                // generate unique name for image with timestamp and random string
                $uniqueName = time() . '-' . Str::random(10) . '.' . $image->getClientOriginalExtension();
                // store image im public folder with unique name
                $image->move('product_images', $uniqueName);

                // create new product image data with product_id and unique name
                ProductImage::create([
                    'product_id' => $product->id,
                    'image' => 'product_images/' . $uniqueName,
                ]);
            }
        }

        return redirect()->route('admin.products.index')->with('success', 'Product Successfully Added');
    }

    public function updateProduct(Request $request, $id){
        $product = Product::findOrFail($id);
        $product->title = $request->title;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;

        //check if product has uploaded image
        if ($request->hasFile('product_images')){
            $productImages = $request->file('product_images');
            foreach ($productImages as $image){

                // generate unique name for image with timestamp and random string
                $uniqueName = time() . '-' . Str::random(10) . '.' . $image->getClientOriginalExtension();
                // store image im public folder with unique name
                $image->move('product_images', $uniqueName);

                // create new product image data with product_id and unique name
                ProductImage::create([
                    'product_id' => $product->id,
                    'image' => 'product_images/' . $uniqueName,
                ]);
            }
        }

        $product->update();

        return redirect()->route('admin.products.index')->with('success', 'Product Successfully Updated');
    }

    public function deleteImage($id){
        $image = ProductImage::where('id', $id)->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product Image Successfully Deleted');
    }

    public function destroyProduct($id){
        $product = Product::findOrFail($id)->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product Successfully Deleted');
    }
}
