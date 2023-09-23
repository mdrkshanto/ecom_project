<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory,Sluggable;
    protected $guarded=[];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    private static $unit;

    protected static function newUnit($request)
    {
        self::$unit = new Unit();
        self::$unit->name = ucwords($request->name);
        self::$unit->description = $request->description;
        self::$unit->save();
    }

    protected static function updateUnit($request, $id)
    {
        self::$unit = Unit::find($id);
        self::$unit->name = ucwords($request->name);
        self::$unit->description = $request->description;
        self::$unit->status = $request->status;
        self::$unit->save();
    }

    protected static function deleteUnit($id)
    {
        self::$unit = Unit::find($id);
        self::$unit->delete();
    }
}
