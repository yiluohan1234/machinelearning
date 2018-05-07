<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Excel;
use App\Models\Monitor;
use App\Exports\CunliangExport;
class ExcelController extends Controller
{
    public function export()
    {
        //return Excel::download(new CunliangExport, 'invoices.xlsx');
        $data = Monitor::get()->toArray();
        return Excel::create('数据更新', function($excel) use ($data) {
            $excel->sheet('数据更新', function($sheet) use ($data)
            {
                $sheet->cell('A1', function($cell) {$cell->setValue('update_date');   });
                $sheet->cell('B1', function($cell) {$cell->setValue('file_type');   });
                $sheet->cell('C1', function($cell) {$cell->setValue('file_num');   });
                $sheet->cell('D1', function($cell) {$cell->setValue('space_size');   });
                $sheet->cell('E1', function($cell) {$cell->setValue('exec_time');   });
                $sheet->cell('F1', function($cell) {$cell->setValue('created_at');   });
                if (!empty($data)) {
                    foreach ($data as $key => $value) {
                        $i= $key+2;
                        $sheet->cell('A'.$i, $value['update_date']);
                        $sheet->cell('B'.$i, $value['file_type']);
                        $sheet->cell('C'.$i, $value['file_num']);
                        $sheet->cell('D'.$i, $value['space_size']);
                        $sheet->cell('E'.$i, $value['exec_time']);
                        $sheet->cell('F'.$i, $value['created_at']);
                    }
                }
            });
        })->download('xlsx');
    }
}
