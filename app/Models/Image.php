<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $table = "images";

    // Get image by id from db
    public static function getImageById($id)
    {
        $image = self::where('Id',$id)->get();
        return $image[0];
    }

    // Get images by tags
    public static function getImagesByTags($tags = [], $limit = 6, $excId = '')
    {
        $images = self::where('Tags','regexp',implode('|',$tags))
        ->where('Id','!=',$excId)
        ->limit($limit)->get();
        return $images;
    }
}
