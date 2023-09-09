<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function show_login()
    {
        //
        return redirect()->route('user.login');
    }


    public function show_reg()
    {
        //
        // $user = User::create($request->all());
        return redirect()->route('user.reg');
    }

    public function show_profile($id)
    {
        $user = User::find($id);
        return view('user.profile', compact('user'));
    }

    public function store(Request $request)
    {
        //
        $user = User::create($request->except(['updated_at', 'created_at']));
        return view('user.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        // print_r($credentials);
        if ($credentials['email'] == "admin@admin.com" && $credentials['password'] == "admin") {
            return redirect()->route('category.index');
        } else {
            $existingUser = DB::table('users')
                ->where('email', $credentials['email'])
                ->first(); // Retrieve the user record with the given emai
            if ($existingUser && Hash::check($credentials['password'], $existingUser->password)) {
                return redirect()->route('user.profile', ['id' => $existingUser->id]);
            } else {
                return back()->withErrors(['loginError' => 'Invalid email or password.']);
            }
        }
    }
}
