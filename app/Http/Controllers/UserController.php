<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login()
    {
        return view("front.login");
    }

    public function loginCheck(Request $request)
    {
        $username = $request->login_username;
        $password = $request->login_password;
        $user = User::where("username", $username)->first();
        if ($username && Hash::check($password, $user->password)) {
            Auth::login($user);
            return redirect()->route("home");
        } else {
            return redirect()
                ->route("login")
                ->withErrors([
                    "password" => "Lütfen Bilgilerinizi Kontrol Edin!"
                ])
                ->onlyInput("login_username");
        }
    }

    public function logout(Request $request)
    {
        if (Auth::check()) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route("home");
        }
    }

    public function create()
    {
        return view("front.register");
    }

    public function store(Request $request)
    {
        $createUserList = [
            "name" => $request->register_name,
            "surname" => $request->register_surname,
            "username" => $request->register_username,
            "email" => $request->register_email,
            "phone" => $request->register_phone,
            "city" => $request->register_city,
            "district" => $request->register_district,
            "address" => $request->register_address,
            "password" => $request->register_password
        ];
        $user = User::create($createUserList);
        return redirect()->route("home");
    }

    public function edit()
    {
        $getUserData = User::where("id", \auth()->user()->id)->first();
        return view("front.edit-account", compact("getUserData"));
    }

    public function update(Request $request)
    {
        $updateUserList = [
            "name" => $request->update_name,
            "surname" => $request->update_surname,
            "username" => $request->update_username,
            "email" => $request->update_email,
            "phone" => $request->update_phone,
            "city" => $request->update_city,
            "district" => $request->update_district,
            "address" => $request->update_address,
            "password" => $request->update_password
        ];
        User::where("id", \auth()->user()->id)
            ->update(array_filter($updateUserList));
        return redirect()->route("user.edit");
    }

    public function destroy(Request $request)
    {
        User::destroy($request->id);
        return redirect()->route("home");
    }
}
