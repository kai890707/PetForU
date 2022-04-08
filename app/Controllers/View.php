<?php

namespace App\Controllers;

class View extends BaseController
{
    protected $pet_model;
    protected $publish_model;
    protected $collet_model;
    public function __construct()
    {
        $this->pet_model =new \App\Models\PetModel();
        $this->collet_model =new \App\Models\ColletModel();
        $this->publish_model =new \App\Models\PublishedModel();
    }
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
        //分頁的字在 system\Language\en\Pager.php 更改
        $data = [
            'page_title' => '找浪浪',
            'pets' => $this->pet_model->paginate(12),
            'pager' => $this->pet_model->pager
        ];
        echo view('find_view/find', $data);
    }
    public function pet_view($id = null)
    {
        $user_id = session()->get('user_id');
        $petinfo = $this->pet_model->selectPetDataById($id);
        $isCollect = $this->collet_model->isCollect($user_id,$id);
        if($petinfo){
            $data = [
                'page_title' => '浪浪資訊',
                'pet_info'=>$petinfo,
                'isCollect'=>$isCollect
            ];
            
            echo view('pet_view/pet', $data);
        }else{
            echo view('404');
        }
        
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
            'pets' => $this->publish_model->paginate(12),
            'pager' => $this->publish_model->pager
        ];
        echo view('publish_view/publish', $data);
    }
    public function sendMail()
    {
        $data = [
            'page_title' => '找回密碼',

        ];
        echo view('sendMail', $data);
    }
}
