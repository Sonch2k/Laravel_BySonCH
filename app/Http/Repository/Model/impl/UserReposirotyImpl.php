<?php

namespace App\Http\Repository\Model\impl;

use App\Http\Repository\Base\BaseRepositoryImpl;
use App\Http\Repository\Base\Repository;
use App\Http\Repository\Base\RepositoryImpl;
use App\Http\Repository\Model\UserRepository;
use App\User;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserReposirotyImpl extends RepositoryImpl implements UserRepository
{

    public function getModel()
    {
        return User::class;
    }

    public function authenticate($request)
    {
        $credentials = [
            'email' => $request['username'],
            'password' => $request['password']
        ];
        if (auth()->attempt($credentials)) {
            return true;
        } else {
            return false;
        }
    }

    public function findByEmail($email)
    {
        return $this->model->where('email', $email)->first();
    }
    public function changePass($request)
    {
        $credentials = [
            'email' => $request['email'],
            'password' => $request['old_pass']
        ];
        if (auth()->attempt($credentials)) {
            $user=$this->findByEmail($request['email']);
            $user['password']=bcrypt($request['new_pass']);
            $user->save();
            return true;
        } else {
            return false;
        }
    }
}
