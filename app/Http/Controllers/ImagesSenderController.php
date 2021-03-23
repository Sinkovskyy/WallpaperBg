<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class ImagesSenderController extends Controller
{

    private function encodeToJson($images)
    {
        $json = [];
        for($i = 0; $i < count($images);$i++)
        {
            $json[$i]['id'] = $images[$i]['id'];
            $json[$i]['tags'] = $images[$i]['tags'];
            $json[$i]['compressed_image'] = base64_encode($images[$i]['compressed_image']);
        }
        return $json;
    }

    public function getImages(Request $request)
    {
        $limit = 21;
        $tag = substr(request()->input('tag'),1);
        $page = intval(request()->input('page'));
        $sortBy = request()->input('sort');
        if($tag == "all") $tag = "";
        $images = Image::getImagesByTags([$tag],$sortBy,$limit,offset:$limit*$page);
        $images = $this->encodeToJson($images);
        return response()->json([
            'images' => $images,
        ]);
    }

}
