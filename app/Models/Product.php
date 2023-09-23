<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = [];
    private static $product, $otherImage, $imageDirectory = 'images/product';

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    protected static function newProduct($request)
    {
        self::$product = new Product();
        self::$product->category_id = $request->category_id;
        self::$product->subcategory_id = $request->subcategory_id;
        self::$product->brand_id = $request->brand_id;
        self::$product->unit_id = $request->unit_id;
        self::$product->name = ucwords($request->name);
        self::$product->code = genId('products', 'code', 12, date('Y'));
        self::$product->short_description = $request->short_description;
        self::$product->long_description = $request->long_description;
        self::$product->regular_price = $request->regular_price;
        self::$product->selling_price = $request->selling_price;
        self::$product->stock_amount = $request->stock_amount;
        self::$product->reorder_label = $request->reorder_label;
        self::$product->image = imageUrl($request->file('image'), self::$imageDirectory, 750, 1000);
        self::$product->save();

        if ($request->file('other_images')) {
            OtherImage::newOtherImage($request->file('other_images'), self::$product->id);
        }
    }

    protected static function updateProduct($request, $id)
    {
        self::$product = Product::find($id);

        self::$product->category_id = $request->category_id;
        self::$product->subcategory_id = $request->subcategory_id;
        self::$product->brand_id = $request->brand_id;
        self::$product->unit_id = $request->unit_id;
        self::$product->name = $request->name;
        self::$product->short_description = $request->short_description;
        self::$product->long_description = $request->long_description;
        self::$product->regular_price = $request->regular_price;
        self::$product->selling_price = $request->selling_price;
        self::$product->stock_amount = $request->stock_amount;
        self::$product->reorder_label = $request->reorder_label;
        self::$product->featured_status = $request->featured_status;
        self::$product->carousel_status = $request->carousel_status;
        self::$product->status = $request->status;
        if ($request->file('image')) {
            if (file_exists(self::$product->image)) {
                unlink(self::$product->image);
            }
            self::$product->image = imageUrl($request->file('image'), self::$imageDirectory,750,1000);
        }
        self::$product->save();

        if ($request->file('other_images')) {
            OtherImage::updateOtherImage($request->file('other_images'), self::$product->id);
        }
    }

    protected static function deleteProduct($id)
    {
        self::$product = Product::find($id);

        if (file_exists(self::$product->image))
        {
            unlink(self::$product->image);
        }
        if (self::$product->otherImages)
        {
            OtherImage::deleteOtherImages(self::$product->id);
        }
        self::$product->delete();
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function otherImages()
    {
        return $this->hasMany(OtherImage::class);
    }

    public function orderDeatil()
    {
        return $this->belongsTo(OrderDetail::class);
    }
}
