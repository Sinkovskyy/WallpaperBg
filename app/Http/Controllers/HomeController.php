<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Image;

class HomeController extends Controller
{
    public function load()
    {
        $images = Image::getImagesByTags([""]);
        $tags = Tag::getTags();
        return view('home',['tags'=>$tags,'images'=>$images]);
    }


    public function loadByTag($tag)
    {
        if ($tag == "all") $tag = "";
        $images = Image::getImagesByTags([$tag]);
        $tags = Tag::getTags();
        return view('home',['tags'=>$tags,'images'=>$images]);
    }

}
