<?php

namespace App\Controllers;

class View extends BaseController
{
    public function index()
    {
        $data = [
            'page_title' => '首頁',
        ];
        echo view('home_view/home', $data);
    }
    public function login_view()
    {
        $data = [
            'page_title' => '登入',
        ];
        echo view('sign_view/login', $data);
    }
    public function register_view()
    {
        $data = [
            'page_title' => '註冊',
        ];
        echo view('sign_view/register', $data);
    }
 
}
