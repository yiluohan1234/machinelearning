<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Charts;
use App\Models\Cunliang;


class CunliangController extends Controller
{
    public function table()
    {
        //$data = Cunliang::where("file_type", "O")->get();
        $data = Cunliang::all();
        return view('admin.cunliang.table', compact('data'));
    }
    public function pic()
    {
        // $data = Cunliang::where("file_type", "O")->orderBy('created_at','desc')
        //                 ->take(7)
        //                 ->get();

        // $chart = Charts::create('bar', 'highcharts')
        //              ->title('O域数据最近七天更新情况')
        //              ->elementLabel('大小(M)')
        //              ->labels($data->pluck('created_at'))
        //              ->values($data->pluck('space_size'))
        //              ->responsive(false);
        // $output = shell_exec('python /home/vagrant/www/machinelearning/public/test.py');
        // //$command = exec("python /home/.../src/lib/jobs.py  $var1");
        // dd($output);
        return view('admin.cunliang.pic');
    }
    public function odata()
    {
        $data = Cunliang::where("file_type", "O")->latest()
                        ->take(7)
                        ->get();

        return array_reverse($data->toArray(),false);

    }

}
