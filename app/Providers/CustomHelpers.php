<?php
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Haruncpi\LaravelIdGenerator\IdGenerator;

function imageUrl($image, $directory, $width = false, $height = false)
{
    if (!is_dir($directory)) {
        mkdir($directory, 0755, true);
    }
    $imageName = hexdec(uniqid()) . '.webp';
    $imageUrl = $directory . '/' . $imageName;
    Image::make($image)->encode('webp',100)->resize($width, $height)->save($imageUrl);
    return $imageUrl;
}

function genId($table, $field, $length, $prefix)
{
    return IdGenerator::generate(['table' => $table, 'field' => $field, 'length' => $length, 'prefix' => $prefix]);
}

function subWords($string, $words = 50, $end = null)
{
    return Str::words($string, $words, $end);
}
