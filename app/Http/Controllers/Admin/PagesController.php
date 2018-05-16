<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class PagesController extends Controller
{
    public function index()
    {
        if(Auth::check() == false){
            return redirect('/login');
        }
        else
        {
            return view('admin.index');
        }
    }
    public function profile()
    {
        return view('admin.profile');
    }
}
