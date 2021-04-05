<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Tag;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function load($id)
    {
        $limit = 6;
        $image = Image::getImageById($id);
        $rec = Image::getImagesByTags(explode(' ',$image->tags),null,$limit,$id,null);
        return view('page',['image' => $image,'rec' => $rec]);
    }

    public function updateDownloadedTimes(Request $request)
    {
        $id = request()->input('id');
        $times = Image::getImageDownloadedTimes($id);
        $times++;
        Image::updateImageDownloadedTimes($id,$times);
        return response()->json([
            'res' => $times,
        ]);
    }

}
