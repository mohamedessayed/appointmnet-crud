<?php

namespace App\Http\Controllers;

use App\Services\FileUploadSeervice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //

    public function setting(){
        return view('pages.user.setting');
    }


    public function change_image(Request $request) {
        $request->validate([
            'image'=> 'required|image|mimes:jpg,png,jpeg,webP|max:2048'
        ]);


        $path = FileUploadSeervice::FileUpload($request->file('image'),'images');

        Auth::guard('web')->user()->update([
            'image'=> $path
        ]);


        return back()->with('image uploaded successfully');
    }
}
