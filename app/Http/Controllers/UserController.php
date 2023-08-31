<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Cart;
use App\Models\User;
use App\Services\UserService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    protected UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

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

        if ($this->userService->attemptLogin($username, $password)) {
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
        $createUserData = $request->only([
            "register_name",
            "register_surname",
            "register_username",
            "register_email",
            "register_phone",
            "register_address",
            "register_password"
        ]);

        try {
            $this->userService->attemptCreate($createUserData, $createUserData['register_username']);
        } catch (Exception $e) {
            return $e->getMessage();
        }
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
        $userId = Auth::user()->id;
        if (Route::is("user.update")) {
            $updateUserData = $request->only([
                "update_name",
                "update_surname",
                "update_username",
                "update_email",
                "update_phone",
                "update_city",
                "update_district",
                "update_address",
                "update_password"
            ]);
            try {
                $this->userService->attempUpdate($updateUserData, $request->id);
            } catch (Exception $e) {
                return $e->getMessage();
            }
            return redirect()->route("user.edit");
        } elseif (Route::is("backoffice.user.update")) {
            $updateUserData = $request->only([
                "update_backoffice_user_name",
                "update_backoffice_user_surname",
                "update_backoffice_user_username",
                "update_backoffice_user_email",
                "update_backoffice_user_phone",
                "update_backoffice_user_address",
                "update_backoffice_user_role",
                "update_backoffice_user_password"
            ]);
            try {
                $this->userService->attempUpdate($updateUserData, $request->id);
            } catch (Exception $e) {
                return $e->getMessage();
            }
            return redirect()->route("backoffice.user.edit", ['id' => $request->id]);
        }
    }

    public function destroy(Request $request)
    {
        User::destroy($request->id);
        return redirect()->route("backoffice.user.index");
    }
}
