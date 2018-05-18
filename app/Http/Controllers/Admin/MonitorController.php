<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Charts;
use App\Models\Monitor;


class MonitorController extends Controller
{
    public function table()
    {
        return view('admin.monitor.table');
    }
     public function tabledata()
    {
        $odata = Monitor::all();
        $data = array_reverse($odata->toArray(),false);
        return $data;
    }

    public function pic()
    {
        // $data = Monitor::where("file_type", "O")->orderBy('created_at','desc')
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
        return view('admin.monitor.pic');
    }
    //数据近七日更新情况
    public function odata()
    {
        $odata = Monitor::where("file_type", "O")->orderBy('update_date', 'desc')
                        ->take(7)
                        ->get();
        $odata_v = array_reverse($odata->toArray(),false);
        $ldata = Monitor::where("file_type", "label")->orderBy('update_date', 'desc')
                        ->take(7)
                        ->get();
        $ldata_v = array_reverse($ldata->toArray(),false);

        $result = [
            "O" => $odata_v,
            "label" => $ldata_v
            ];

        return $result;

    }
    //本地磁盘占用情况
    public function filesystem()
    {
        $data = Monitor::where("file_type", "O")->orderBy('update_date', 'desc')
                        ->take(1)
                        ->get();
        $result = [
            [
                "value" => $data[0]->filesystem_used,
                "name" => "使用量"
            ],
            [
                "value"=>$data[0]->filesystem_size,
                "name"=>"总量"
            ]
        ];

        return $result;

    }

}
