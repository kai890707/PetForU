<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }
    public function getValue()
    {
        return view('home_view/home.php');
    }
}
