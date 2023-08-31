<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

class UserService
{
    protected UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function attemptLogin($username, $password)
    {
        $user = $this->userRepository->getUser($username);
        if ($user && Hash::check($password, $user->password)) {
            Auth::login($user);
        } else {
            return false;
        }
    }

    public function attemptCreate($createUserData, $username,)
    {
        $user = $this->userRepository->getUser($username);
        if ($user) {
            throw new \Exception("Böyle bir kullanıcı adı zaten mevcut");
        } else {
            $this->userRepository->save($createUserData);
        }
    }

    public function attempUpdate($updateUserData, $id)
    {
        if (Route::is("user.update")) {
            $userId = Auth::user()->id;
            $this->userRepository->frontUpdate($updateUserData, $userId);
        } elseif (Route::is("backoffice.user.update")) {
            $this->userRepository->backofficeUpdate($updateUserData, $id);
        }
    }
}



