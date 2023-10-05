<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageCropperController extends Controller
{
    public function uploadCropImage(Request $request)
    {
        $folderPath = public_path('uploads/profile/');
 
        $image_parts = explode(";base64,", $request->image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
 
        $imageName = uniqid() . '.png';
 
        $imageFullPath = $folderPath.$imageName;
 
        file_put_contents($imageFullPath, $image_base64);

        $response = [];
        $response['img_name'] = $imageName;
        $response['success'] = 'Image cropped';
    
        return response()->json($response);
    }
}
