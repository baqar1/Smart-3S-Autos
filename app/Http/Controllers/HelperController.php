<?php

namespace App\Http\Controllers;

use App\Models\SmartImage;
use Illuminate\Http\Request;

class HelperController extends Controller
{
    public  function uploadImage(Request $request){

        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('images'),$imageName);
        
        $imageUpload = new SmartImage();
        $imageUpload->filename = $imageName;
        $imageUpload->image_id = $request->image_id;
        $imageUpload->save();
        return response()->json(['success'=>$imageName]);
    }
    public function deleteImage(Request $request){
        $filename =  $request->get('filename');
        SmartImage::where('filename',$filename)->delete();
        $path=public_path().'/images/'.$filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return $filename;

    }
}
