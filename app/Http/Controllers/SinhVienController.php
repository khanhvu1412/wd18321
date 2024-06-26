<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SinhVienController extends Controller
{
    function thongtinSV(){
        $sv = [
            [
                'id' => '1',
                'name' => 'Vũ',
                'age' => '20',
                'major' => "Sinh viên"
            ],
            [
                'id' => '2',
                'name' => 'Long',
                'age' => '25',
                'major' => "Giáo viên"
            ]
            ];
            return view('thong-tin-gt-sv')->with([
                'sinhvien'   => $sv
            ]);
    }
}
