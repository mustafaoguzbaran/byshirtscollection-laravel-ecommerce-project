<?php

namespace App\Repositories;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use http\Env\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserRepository
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getUser($username)
    {
        return User::where("username", $username)->first();
    }

    public function save($createUserData)
    {
        $user = new $this->user;
        $user->name = $createUserData["register_name"];
        $user->surname = $createUserData["register_surname"];
        $user->username = $createUserData["register_username"];
        $user->email = $createUserData["register_email"];
        $user->phone = $createUserData["register_phone"];
        $user->address = $createUserData["register_address"];
        $user->password = $createUserData['register_password'];
        $user->save();
        $user->syncRoles(Role::find(2)->name);
        $cart = new Cart();
        $cart->user_id = $user->id;
        $cart->total_amount = 0.00;
        $cart->merchant_oid = time() . mt_rand();
        $cart->save();
    }

    public function frontUpdate($updateUserData, $id)
    {
        $user = $this->user->find($id);
        if ($updateUserData["update_password"]) {
            $updateUserData['update_password'] = Hash::make($updateUserData["update_password"]);
        } elseif ($updateUserData["update_password"] == null) {
            $updateUserData["update_password"] = $user->password;
        }
        $user->name = $updateUserData["update_name"];
        $user->surname = $updateUserData["update_surname"];
        $user->username = $updateUserData["update_username"];
        $user->email = $updateUserData["update_email"];
        $user->phone = $updateUserData["update_phone"];
        $user->address = $updateUserData["update_address"];
        $user->password = $updateUserData['update_password'];
        $user->update();
    }

    public function backofficeUpdate($updateUserData, $id)
    {
        $user = $this->user->find($id);
        if ($updateUserData["update_backoffice_user_password"]) {
            $updateUserData['update_backoffice_user_password'] = Hash::make($updateUserData["update_backoffice_user_password"]);
        } elseif ($updateUserData["update_backoffice_user_password"] == null) {
            $updateUserData["update_backoffice_user_password"] = $user->password;
        }
        $user->name = $updateUserData["update_backoffice_user_name"];
        $user->surname = $updateUserData["update_backoffice_user_surname"];
        $user->username = $updateUserData["update_backoffice_user_username"];
        $user->email = $updateUserData["update_backoffice_user_email"];
        $user->phone = $updateUserData["update_backoffice_user_phone"];
        $user->address = $updateUserData["update_backoffice_user_address"];
        $user->password = $updateUserData['update_backoffice_user_password'];
        $user->update();
        $user->syncRoles(Role::find($updateUserData["update_backoffice_user_role"]));
    }
}
