<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
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

    private static $category, $imageDirectory = 'images/category', $width = 200, $height = 150;

    protected static function newCategory($request)
    {
        self::$category = new Category();

        if ($request->file('image')) {
            self::$category->image = imageUrl($request->file('image'), self::$imageDirectory, self::$width, self::$height);
        }
        self::$category->name = ucwords($request->name);
        self::$category->description = $request->description;
        self::$category->save();
    }

    protected static function updateCategory($request, $id)
    {
        self::$category = Category::find($id);
        if ($request->file('image')) {
            if (file_exists(self::$category->image)) {
                unlink(self::$category->image);
            }
            self::$category->image = imageUrl($request->file('image'), self::$imageDirectory, self::$width, self::$height);
        }
        self::$category->name = ucwords($request->name);
        self::$category->description = $request->description;
        self::$category->featured_status = $request->featured_status;
        self::$category->status = $request->status;
        self::$category->save();
    }

    protected static function deleteCategory($id)
    {
        self::$category = Category::find($id);
        if (file_exists(self::$category->image)) {
            unlink(self::$category->image);
        }
        self::$category->delete();
    }

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
