<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    //
    public function home()
    {
        if(Auth::check() == false){
            return redirect('/login');
        }
        else
        {
            return view('pages.home');
        }

    }

}
