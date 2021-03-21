<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $table = "images_db";

    // Get image by id from db
    public static function getImageById($id)
    {
        $image = self::where('Id',$id)->get();
        return $image[0];
    }

    // Get images by tags
    public static function getImagesByTags($tags = [], $limit = 42, $excId = '',$offset = 0)
    {
        $images = self::where('Tags','regexp',implode('|',$tags))
        ->where('id','!=',$excId)
        ->offset($offset)
        ->limit($limit)->get();
        return $images;
    }


    // Get just compressed imagess by tags
    public static function getCompressedImagesByTags($tags = [], $limit = 42, $excId = '',$offset = 0)
    {
        $images = self::select('id','tags','compressed_image')->where('tags','regexp',implode('|',$tags))
        ->where('id','!=',$excId)
        ->offset($offset)
        ->limit($limit)->get();
        return $images;
    }

}
