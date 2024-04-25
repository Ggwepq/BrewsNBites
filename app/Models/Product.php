<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Product extends Model
{
    use HasSlug;
    use HasFactory;
    
    protected $fillable = [
       'title',
       'slug',
       'description',
       'price',
       'published',
       'in_stock',
       'created_by',
       'deleted_by',
       'updated_by'
    ];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function product_images(){
        return $this->hasMany(ProductImage::class);
    }

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function category(){
        return $this->belongsTo(Catergory::class);
    }

    public function cartItem(){
        return $this->hasMany(CartItem::class);
    }

    //filter logic for price or categories brands
    public function scopeFiltered(Builder $quary) {
        $quary
        ->when(request('brands'), function(Builder $q) {
            $q->withIn('brand_id', request('brands'));
        })

        ->when(request('brands'), function(Builder $q) {
            $q->withIn('brand_id', request('brands'));
        })

        ->when(request('categories'), function(Builder $q) {
            $q->withIn('category_id', request('categories'));
        })

        ->when(request('prices'), function(Builder $q) {
            $q->whereBetween('price', [
                request('prices.from', 0),
                request('prices.to', 100000),
            ]);
        });
    }
}
