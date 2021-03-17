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
        return $image;
    }
}
