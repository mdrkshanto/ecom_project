<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory, Sluggable;
    protected $guarded = [];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    private static $brand, $imageDirectory = 'images/brand', $width = 200, $height = 150;

    protected static function newBrand($request)
    {
        self::$brand = new Brand();

        if ($request->file('image')) {
            self::$brand->image = imageUrl($request->file('image'), self::$imageDirectory, self::$width, self::$height);
        }
        self::$brand->name = ucwords($request->name);
        self::$brand->description = $request->description;
        self::$brand->save();
    }

    protected static function updateBrand($request, $id)
    {
        self::$brand = Brand::find($id);
        if ($request->file('image')) {
            if (file_exists(self::$brand->image)) {
                unlink(self::$brand->image);
            }
            self::$brand->image = imageUrl($request->file('image'), self::$imageDirectory, self::$width, self::$height);
        }
        self::$brand->name = ucwords($request->name);
        self::$brand->description = $request->description;
        self::$brand->featured_status = $request->featured_status;
        self::$brand->status = $request->status;
        self::$brand->save();
    }

    protected static function deleteBrand($id)
    {
        self::$brand = Brand::find($id);
        if (file_exists(self::$brand->image)) {
            unlink(self::$brand->image);
        }
        self::$brand->delete();
    }
}
