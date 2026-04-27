<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class SitePagesController extends Controller
{
    //


    public function home() : View {
        return view('pages.home');
    }

    public function signup() : View {
        return view('auth.signup');
    }


}
