<?php

namespace App\Http\Repository\Model;

use App\Http\Repository\Base\Repository;

interface UserRepository extends Repository
{
    public function authenticate($request);

    public function findByEmail($email);

    public function changePass($request);
}
