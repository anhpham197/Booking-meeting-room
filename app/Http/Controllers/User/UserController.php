<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
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

    public function edit($id)
    {
        $user = User::query()->where('id', $id)->first();
        // dd($user);
        return view('user.edit', [
            'user' => $user,
            'company' => $user->company->name
        ]);
    }

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
            return redirect()->route('kath.edit', Auth::user()->id)->with('msgPhone', 'Phone number already exists ! ');
        } else if (empty($existedEmail) != null) {
            return redirect()->route('kath.edit', Auth::user()->id)->with('msgEmail', 'Email already exists ! ');
        } else {
            $user = User::where('id', $id)->update([
                'name' => $request->name,
                'gender' => $request->gender,
                'phone' => $request->phone,
                'email' => $request->email,
                'date_of_birth' => $request->date_of_birth
            ]);
            return redirect()->route('kath.edit', Auth::user()->id)->with('msgUpdateSuccess', "Successfully updated information !");
        }
    }


    public function editPassword($id)
    {
        return view('user.change_password');
    }

    public function changePassword(Request $request, $id)
    {
        $request->validate([
            'newPassword' => 'required|confirmed|min:8',
        ]);
        if (Hash::check($request->newPassword, Hash::make($request->newPassword_confirmation))) {
            User::where('id', $id)->update([
                'password' => Hash::make($request->newPassword)
            ]);
            return redirect()->route('home');
        } else {
            return Redirect::back()->with('message', 'Please confirm the password again');
        }
    }

    public function showUsers(){
        $users = User::query()->where('company_id', Auth::user()->company_id)->simplePaginate(10);
        return view('user.show_users', [
            'users' => $users
        ]);
    }

    public function searchUsers(Request $request) {
        if($request->ajax()) {
            $name = mb_strtolower($request->search, 'UTF-8');
            $users = User::query()->where([
                ['company_id', Auth::user()->company_id],
                ['name', 'LIKE', '%' . $name . '%']
            ])->get();
            return response()->json($users, 200, ['Content-type'=> 'application/json; charset=utf-8'], JSON_UNESCAPED_UNICODE);
        }
    }
}
