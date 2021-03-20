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
        ->where('Id','!=',$excId)
        ->offset($offset)
        ->limit($limit)->get();
        return $images;
    }

    public static function toCustomJson($images)
    {
        $result = [[]];
        for($i = 0; $i < count($images);$i++)
        {
            $result[$i]["id"] = $images[$i]->id;
            $result[$i]["image"] = $images[$i]->image;
            $result[$i]["id"] = $images[$i]->id;
            $reslut[$i] = json_encode($result[$i]);
        }
    }
}
