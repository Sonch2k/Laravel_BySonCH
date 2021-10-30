<?php

namespace App\Http\Services;

interface userServices
{
    public function authenJWT($request);
    public function getAllUsers();
    public function registerUser($request);
    public function changePassword($request);
}
