<?php

namespace App\Http\Services\impl;

use App\Http\Repository\Model\UserRepository;
use App\Http\Services\userServices;
use App\User;

class userServceImpl implements userServices
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function authenJWT($request)
    {
        $credentials = [
            'email' => $request['email'],
            'password' => $request['password']
        ];
        $token = null;
        if (!$token = \Tymon\JWTAuth\Facades\JWTAuth::attempt($credentials)) {
            return response()->json(
                [
                    'message' => 'login fail',
                    'data' => null,
                    'status' => '401'
                ], 401
            );
        }
        return response()->json([
            'message' => 'login success',
            'data' => $token,
            'status' => '200'
        ], 200);
    }

    public function getAllUsers()
    {
        $data = $this->userRepository->getAll();
        return Response()->json(
            [
                'message' => "get successfully",
                'data' => $data,
                'status' => '200'
            ], 200
        );
    }

    public function registerUser($request)
    {
        $credentials = [
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'name' => $request['name']
        ];
        $check = $this->userRepository->findByEmail($credentials['email']);
        if (!empty($check)) {
            return Response()->json(
                [
                    'message' => $credentials['email'] . " is duplicate.Try Agian!",
                    'data' => null,
                    'status' => '201'
                ], 201
            );
        } else {
            $userCreate = User::create($credentials);
            return Response()->json(
                [
                    'message' => "Successfully register",
                    'data' => null,
                    'status' => '200'
                ], 200
            );
        }
    }

    public function changePassword($request)
    {
        $currentInfo = [
            'email' => $request->email,
            'old_pass' => $request->old_pass,
            'new_pass' => $request->new_pass
        ];
        if($this->userRepository->changePass($currentInfo)){
            return Response()->json(
                [
                    'message' => "Successfully change password",
                    'data' => null,
                    'status' => '200'
                ], 200
            );
        }else{
            return Response()->json(
                [
                    'message' => "email or password is notcorrectly!",
                    'data' => null,
                    'status' => '200'
                ], 200
            );
        }
    }
}
