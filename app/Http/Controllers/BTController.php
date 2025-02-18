<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BTController extends Controller
{
    public function tich2so($a , $b){
        $kq = $a * $b;
        return view('baitap', ['kq' => $kq]);
    }

    public function db1(){
        $query = DB::table('loaitin')->select('id', 'ten');
        $kq = $query->first();
        print_r($kq);

        echo "<br> id: {$kq->id}, ten:{$kq->ten}";
    }

    public function db2(){
        $query = DB::table('loaitin')->select('id', 'ten');
        $kq = $query->get();

        print_r($kq);

        foreach ($kq as $row) {
            echo "<br> id: {$row->id}, ten: {$row->ten}";
        }
    }
}
