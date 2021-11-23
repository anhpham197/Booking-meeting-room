<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\Console\Helper\Helper;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::query()->where('id', $id)->first();
        // dd($user);
        return view('user.edit', [
            'user' => $user,
            'company' => $user->company->name
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required|numeric',
            'email' => 'required|email',
        ]);

        $existedEmail = User::query()->where('email', $request->email);
        $existedPhone = User::query()->where('phone', $request->phone);

        if (empty($existedPhone) != null) {
            return redirect()->route('kath.edit', Auth::user()->id)->with('msgPhone', 'Số điện thoại đã tồn tại ! ');
        } else if (empty($existedEmail) != null) {
            return redirect()->route('kath.edit', Auth::user()->id)->with('msgEmail', 'Email đã tồn tại ! ');
        } else {
            $user = User::where('id', $id)->update([
                'name' => $request->name,
                'gender' => $request->gender,
                'phone' => $request->phone,
                'email' => $request->email,
                'date_of_birth' => $request->date_of_birth
            ]);
            return redirect()->route('kath.edit', Auth::user()->id)->with('msgUpdateSuccess', "Cập nhập thông tin thành công !");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    

    public function editPassword($id) {
        return view('user.change_password');
    }

    public function changePassword(Request $request, $id)
    {
        $request->validate([
            'newPassword'=>'required|confirmed|min:8',
        ]);
        if (Hash::check($request->newPassword, Hash::make($request->newPassword_confirmation))) {
            User::where('id', $id)->update([ 
                'password' => Hash::make($request->newPassword)
            ]);
            return redirect()->route('home');
        } else {
            return Redirect::back()->with('message', 'Vui lòng xác nhận lại mật khẩu');
        }
    }

    public function showUsers(){
        $users = User::query()->where('company_id', Auth::user()->company_id)->get();
        // dd(Auth::user()->company_id);
        return view('user.show_users', [
            'users' => $users
        ]);
    }
}
