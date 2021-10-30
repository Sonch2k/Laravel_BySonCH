<?php

namespace App\Http\Repository\Base;

interface Repository
{
    public function getAll();
    public function findById($id);
}
