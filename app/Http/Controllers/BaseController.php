<?php

namespace App\Http\Controllers;

class BaseController extends Controller
{
    protected $name;
    protected $model;
    public function __construct($name, $model)
    {
        $this->name = sprintf('%s.%s', "admin", $name);
        $this->model = $model;
    }

    protected function getView($view)
    {
        return sprintf('%s.%s', $this->name, $view);
    }

    protected function getViewIndex()
    {
        return $this->getView('index');
    }

    protected function getViewCreateOrEdit()
    {
        return $this->getView('create-edit');
    }
}
