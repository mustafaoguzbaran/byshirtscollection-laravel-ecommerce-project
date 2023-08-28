<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $userData = User::all();
        return view("backoffice.all-user", compact("userData"));
    }

    public function login()
    {
        if (Auth::check()) {
            return redirect()->route("home");
        } else {
            return view("front.login");
        }
    }

    public function loginCheck(LoginRequest $request)
    {
        $username = $request->username;
        $password = $request->password;
        $user = User::where("username", $username)->first();
        if ($username && Hash::check($password, $user->password)) {
            Auth::login($user);
            return redirect()->route("home");
        } else {
            return redirect()
                ->route("user.login")
                ->withErrors([
                    "password" => "Lütfen Bilgilerinizi Kontrol Edin!"
                ])
                ->onlyInput("username");
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
        if (Auth::check()) {
            return redirect()->route("home");
        } else {
            return view("front.register");
        }
    }

    public function store(RegisterRequest $request)
    {
        $createUserList = [
            "name" => $request->register_name,
            "surname" => $request->register_surname,
            "username" => $request->register_username,
            "email" => $request->register_email,
            "phone" => $request->register_phone,
            "address" => $request->register_address,
            "password" => $request->register_password
        ];
        $user = User::create($createUserList);
        $user->syncRoles(Role::find(2)->name);
        $cart = new Cart();
        $cart->user_id = $user->id;
        $cart->total_amount = 0.00;
        $cart->merchant_oid = time() . mt_rand();
        $cart->save();
        return redirect()->route("home");
    }

    public function edit(Request $request)
    {
        if (Route::is("backoffice.user.edit")) {
            $backofficeUserData = User::where("id", $request->id)->first();
            $roleData = Role::all();
            return view("backoffice.edit-user", compact("backofficeUserData", "roleData"));
        } elseif (Route::is("user.edit")) {
            $frontUserData = User::where("id", \auth()->user()->id)->first();
            return view("front.edit-account", compact("frontUserData"));
        }
    }

    public function update(Request $request)
    {
        if (Route::is("user.update")) {
            $updateUserList = [
                "name" => $request->update_name,
                "surname" => $request->update_surname,
                "username" => $request->update_username,
                "email" => $request->update_email,
                "phone" => $request->update_phone,
                "city" => $request->update_city,
                "district" => $request->update_district,
                "address" => $request->update_address,
            ];
            if ($request->update_password != null) {
                $updateUserList['password'] = Hash::make($request->update_password);
            }
            User::where("id", \auth()->user()->id)
                ->update(array_filter($updateUserList));
            return redirect()->route("user.edit");
        } elseif (Route::is("backoffice.user.update")) {
            $updateUserList = [
                "name" => $request->update_backoffice_user_name,
                "surname" => $request->update_backoffice_user_surname,
                "username" => $request->update_backoffice_user_username,
                "email" => $request->update_backoffice_user_email,
                "phone" => $request->update_backoffice_user_phone,
                "city" => $request->update_backoffice_user_city,
                "district" => $request->update_backoffice_user_district,
                "address" => $request->update_backoffice_user_address,
            ];
            if ($request->update_backoffice_user_password != null) {
                $updateUserList['password'] = Hash::make($request->update_backoffice_user_password);
            }
            User::where("id", $request->id)
                ->update(array_filter($updateUserList));
            $user = User::find($request->id);
            $user->syncRoles(Role::find($request->update_backoffice_user_role));
            return redirect()->route("backoffice.user.edit", ['id' => $request->id]);
        }

    }

    public function destroy(Request $request)
    {
        User::destroy($request->id);
        return redirect()->route("backoffice.user.index");
    }
}
