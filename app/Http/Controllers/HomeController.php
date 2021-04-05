<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Image;

class HomeController extends Controller
{
    public function load()
    {
        return redirect('/all');
    }


    public function loadByTag($tag)
    {
        $images = Image::getImagesByTags([$tag]);
        $tags = Tag::getTags();
        return view('home',['tags'=>$tags,'images'=>$images]);
    }

}
