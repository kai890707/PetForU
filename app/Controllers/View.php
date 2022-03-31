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
    public function find_view()
    {
        $data = [
            'page_title' => '找浪浪',
        ];
        echo view('find_view/find', $data);
    }
    public function pet_view($id = null)
    {
        $data = [
            'page_title' => '浪浪資訊',
        ];
        echo view('pet_view/pet', $data);
    }
    public function person_view()
    {
        $data = [
            'page_title' => '個人資訊',
        ];
        echo view('member_view/member', $data);
    }
    public function publish_view()
    {
        $data = [
            'page_title' => '寵物媒合',
        ];
        echo view('publish_view/publish', $data);
    }
}
