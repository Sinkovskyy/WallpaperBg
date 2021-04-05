<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
    public static function getImagesByTags($tags = [],$sortBy = "Newest", $limit = 42, $excId = '',$offset = 0)
    {
        if ($tags[0] == "all")
        {
            $reg = ".*";
        }
        else 
        {
            $reg = implode('|',$tags); 
        }
        $images = self::where('Tags','regexp',$reg)
        ->where('id','!=',$excId)
        ->offset($offset)
        ->limit($limit);
        $images = self::sortBy($images,$sortBy)->get();
        return $images;
    }



    // Sorting images by types
    private static function sortBy($images,$sortBy)
    {
        if($sortBy == "Newest")
        {
            $images = $images->orderBy('id','desc');
        }
        if($sortBy == "Oldest")
        {
            $images = $images->orderBy('id','asc');
        }
        if($sortBy == "Popular")
        {
            $images = $images->orderBy('downloaded_times','desc');
        }
        if($sortBy == "Unpopular")
        {
            $images = $images->orderBy('downloaded_times','asc');
        }
        return $images;
    }

    // Get just compressed imagess by tags
    public static function getCompressedImagesByTags($tags = [],$sortBy = "Newest", $limit = 42, $excId = '',$offset = 0)
    {
        if ($tags[0] == "all")
        {
            $reg = ".*";
        }
        else 
        {
            $reg = implode('|',$tags); 
        }
        $images = self::select('id','tags','compressed_image')->where('tags','regexp',implode('|',$tags))
        ->where('id','!=',$excId)
        ->offset($offset)
        ->limit($limit);
        $images = self::sortBy($images,$sortBy)->get();
        return $images;
    }


    //Get image downloaded times
    public static function getImageDownloadedTimes($id)
    {
        $times = self::select('downloaded_times')->where('id',$id)->get();
        return $times[0]['downloaded_times'];
    }


    //Update image downloaded times
    public static function updateImageDownloadedTimes($id,$times)
    {
        DB::table('images_db')->where('id',$id)->update(['downloaded_times'=>$times]);
    }

}
