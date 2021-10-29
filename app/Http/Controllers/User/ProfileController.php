<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function edit($id) {
        return view('user.edit')
            ->with('user', User::where('id', $id)->first());
    }

    public function update(Request $request) {
        $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'company'=>'required'
        ]);

        User::query()->update([
            'name' => $request->name,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'email' => $request->email,
            'date_of_birth' => $request->date_of_birth,
            'company' => $request->company
        ]);
        return redirect('');
    }
}
