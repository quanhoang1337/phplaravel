<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ThucTapController extends Controller
{
    public function loikhuyen(){
        $h = gmdate('d/m/y',time());
        return view('loikhuyen', ['homnay' => $h, 'title' => "mr"]);
    }
}
