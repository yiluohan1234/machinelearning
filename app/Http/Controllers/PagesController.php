<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Charts;
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
    public function test()
    {
        return view('pages.test');
    }
    public function test2()
    {
        $chart = Charts::create('donut', 'highcharts')
            ->title('My nice chart')
            ->labels(['First', 'Second', 'Third'])
            ->values([5,10,20])
            ->dimensions(1000,500)
            ->responsive(false);
        return view('pages.test2', ['chart' => $chart]);
    }

}
