<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;

class Tag extends Model
{
    use HasFactory;
    protected $table = 'tags_db';

    // Count images by tag
    private static function imagesAmount($tag)
    {
        if($tag == "all") $tag = ".*";
        $amount = Image::where('Tags','regexp',$tag)->count();
        return $amount;
    }

    // Create array of amount of images for tags
    private static function getTagsImagesAmount()
    {
        $tags = self::orderBy('tag','asc')->get();
        $amounts = [];
        for($i = 0; $i < $tags->count();$i++)
        {
            $amounts[$i] = self::imagesAmount($tags[$i]->tag);
        }
        $amounts[$tags->count()] = self::imagesAmount("all");
        return $amounts;
    }

    // Get tags and amount for them
    public static function getTags()
    {
        $tags = self::orderBy('tag','asc')->get();
        $amounts = self::getTagsImagesAmount();
        for($i = 0; $i < count($tags); $i++)
        {
            $tags[$i]['amount'] = $amounts[$i];
        }
        return $tags;
    }



}
