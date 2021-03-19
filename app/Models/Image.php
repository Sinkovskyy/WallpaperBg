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
    public static function getImagesByTags($tags = [], $limit = 6, $excId = '',$offset = 0)
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
            $result[$i]["id"] = $images[$i]->Id;
            $result[$i]["image"] = $images[$i]->Image;
            $result[$i]["id"] = $images[$i]->Id;
            $reslut[$i] = json_encode($result[$i]);
        }
    }
}
