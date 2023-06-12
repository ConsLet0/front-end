<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function show_all_admin(){
        $admins = User::where('role', 'admin')->orderBy('created_at', 'desc')->get();

        return view('adminpage.page.admin', compact('admins'));
    }
    public function signin(Request $request, User $user)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        if ($request->remember) {
            Cookie::queue('mycookie', $request->email, 15);
        } else {
            Cookie::queue(Cookie::forget('mycookie'));
        }
        $user_data = array(
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        );
        
        if(Auth::attempt($user_data)){

            $user = Auth::user();

            if($user->role == "admin")
            {
                return redirect()->route('admin_home');
            }

        }
        else{
            return back()->withErrors(['msg' => 'Sign In Failed!']);
        }
    }
    
    public function add_admin(Request $request)
    {
        $rules = [
            'name' => 'required|min:3|string|max:50',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8|string'
        ];

        $validator = Validator::make($request->all(),$rules);

        // dd($validator);

        if($validator -> fails())
        {
            return back()->withErrors($validator);
        }

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        
        return redirect()->back()->with('message','New Admin Added');
    }
}
