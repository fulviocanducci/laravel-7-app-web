<?php

namespace App\Http\Controllers;

class AdminController extends BaseController
{
    public function __construct()
    {
        parent::__construct('admin', null);
    }

    public function index()
    {
        return view($this->getViewIndex());
    }
}
