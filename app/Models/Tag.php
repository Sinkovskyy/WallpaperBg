<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;

class Tag extends Model
{
    use HasFactory;
    protected $table = 'tags';

    // Count images by tag
    private static function imagesAmount($tag)
    {
        $amount = Image::where('Tags','regexp',$tag)->count();
        return $amount;
    }
    
    // Create array of amount of images for tags 
    private static function getTagsImagesAmount()
    {
        $tags = self::all();
        // Create for first tag 'All'
        $amounts = [self::imagesAmount('')];
        for($i = 1; $i < $tags->count();$i++)
        {
            $amounts[$i] = self::imagesAmount($tags[$i]->TagName);
        }
        return $amounts;
    }

    public static function getTags()
    {
        $tags = self::all();
        $amounts = self::getTagsImagesAmount();
        for($i = 0; $i < count($tags); $i++)
        {
            $tags[$i]['amount'] = $amounts[$i];
        }
        return $tags;
    }



}
