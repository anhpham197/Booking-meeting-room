<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Test;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function test() {
        $now = date("Y-m-d\TH:i");
        return view('test', [
            'now' => $now
        ]);
    }
}
