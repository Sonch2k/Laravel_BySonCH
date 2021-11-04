<?php

namespace App\Http\Repository\Base;

abstract class RepositoryImpl implements Repository
{

    protected $model;

    public function __construct()
    {
        $this->setModel();
    }

    abstract public function getModel();

    public function setModel()
    {
        $this->model = app()->make($this->getModel());
    }
    public function getAll()
    {
        return $this->model->All();
    }

    public function findById($id)
    {
        return $this->model->find($id);
    }
}
