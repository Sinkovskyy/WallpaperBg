<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Tag;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function load($id)
    {
        $image = Image::getImageById($id);
        $rec = Image::getImagesByTags(explode(' ',$image->tags),excId:$id);
        return view('page',['image' => $image,'rec' => $rec]);
    }


}
