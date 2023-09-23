<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherImage extends Model
{
    use HasFactory;

    private static $otherImage, $otherImages, $imageDirectory = 'images/product/other';

    public static function newOtherImage($images,$id)
    {
        foreach ($images as $image)
        {
            self::$otherImage = new OtherImage();
            self::$otherImage->product_id = $id;
            self::$otherImage->image = imageUrl($image, self::$imageDirectory, 750,1000);
            self::$otherImage->save();
        }
    }

    public static function updateOtherImage($images,$id)
    {
        self::$otherImages = OtherImage::where('product_id', $id)->get();

        foreach (self::$otherImages as $otherImage)
        {
            if (file_exists($otherImage->image))
            {
                unlink($otherImage->image);
            }
            $otherImage->delete();
        }
        self::newOtherImage($images,$id);
    }

    public static function deleteOtherImages($id)
    {
        self::$otherImages = OtherImage::where('product_id', $id)->get();

        foreach (self::$otherImages as $otherImage)
        {
            if (file_exists($otherImage->image))
            {
                unlink($otherImage->image);
            }
            $otherImage->delete();
        }
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
