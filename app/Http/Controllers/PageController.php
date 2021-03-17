<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function load($id)
    {
        $image = Image::getImageById($id);
        return view('page',['image' => $image]);
    }
}
