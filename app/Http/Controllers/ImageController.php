<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class ImageController extends Controller
{
    function all(){
        $images = Image::whereUserId(auth()->id())->get();
        return view('images',compact('images'));
    }
}