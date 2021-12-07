<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

class ChartJsController extends Controller
{
    //
    public function index()
    {
        //dd(\DB::raw("DATE_FORMAT(created_at, '%Y')"));
        $month = ['January','February','March','April','May', 'June', 'July', 'August', 'Septemper', 'October', 'November', 'December'];

        $user = [];
        foreach ($month as $key => $value) {
            $user[] = User::where(\DB::raw("DATE_FORMAT(created_at, '%M')"),$value)->count();
        }

    	return view('admin.chart')->with('month',json_encode($month,JSON_NUMERIC_CHECK))->with('user',json_encode($user,JSON_NUMERIC_CHECK));
    }

    public function roomIndex()
    {
        
    }
}
