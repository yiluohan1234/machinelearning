<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Charts;
use App\Models\Monitor;
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
            return view('admin.index');
        }

    }
    public function icons()
    {
        return view('test.icons');
    }
    public function bootstraptable()
    {
        return view('test.test');
    }
    public function test()
    {
        $odata = Monitor::all();
        $data = array_reverse($odata->toArray(),false);
        return $data;
    }

}
