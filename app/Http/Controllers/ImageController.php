<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImageController extends Controller
{




    public function uploadImage($file)
    {
        $imagePath = public_path('/storage/images') ;
        $file_name = time()."-".$file->getClientOriginalName();
        $file = $file->move($imagePath , $file_name) ;
        Image::make($file)->resize(300 , 200)->save($imagePath.'/'.$file_name) ;

        return $file_name    ;
    }




}
