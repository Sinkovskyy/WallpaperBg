<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class ImagesSenderController extends Controller
{
    public function getImages(Request $request)
    {
        $limit = 2;
        $tag = substr(request()->input("tag"),1);
        $page = intval(request()->input("page"));
        // $images = Image::getImagesByTags(["cars"])->test();

        // $image = base64_encode($images[0]->Image);
        // return response()->json([
        //     "images"=>$images,
        //     "page"=>$page,
        //     "tag"=>$tag,
        // ]);
    }

}
