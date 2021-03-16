<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Image;

class HomeController extends Controller
{
    public function load()
    {
        $images = Image::all();
        $tags = Tag::getTags();
        return view('home',['tags'=>$tags,'images'=>$images]);
    }

}
