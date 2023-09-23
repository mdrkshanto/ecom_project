<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Subcategory extends Model
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

    private static $subcategory, $imageDirectory = 'images/subcategory', $width = 200, $height = 150;

    protected static function newSubcategory($request)
    {
        self::$subcategory = new Subcategory();

        if ($request->file('image')) {
            self::$subcategory->image = imageUrl($request->file('image'), self::$imageDirectory, self::$width, self::$height);
        }
        self::$subcategory->category_id = $request->category_id;
        self::$subcategory->name = ucwords($request->name);
        self::$subcategory->description = $request->description;
        self::$subcategory->save();
    }

    protected static function updateSubcategory($request, $id)
    {
        self::$subcategory = Subcategory::find($id);
        if ($request->file('image')) {
            if (file_exists(self::$subcategory->image)) {
                unlink(self::$subcategory->image);
            }
            self::$subcategory->image = imageUrl($request->file('image'), self::$imageDirectory, self::$width, self::$height);
        }
        self::$subcategory->category_id = $request->category_id;
        self::$subcategory->name = ucwords($request->name);
        self::$subcategory->description = $request->description;
        self::$subcategory->save();
    }

    protected static function deleteSubcategory($id)
    {
        self::$subcategory = Subcategory::find($id);
        if (file_exists(self::$subcategory->image)) {
            unlink(self::$subcategory->image);
        }
        self::$subcategory->delete();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
