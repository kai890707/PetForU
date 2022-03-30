<?php

namespace App\Controllers;

use App\Models\UserModel;

class RegisterController extends BaseController
{
    protected $model;
    public function __construct()
    {
        $this->model = new UserModel();
    }
    public function creatRegister()
    {
        $user_account = $this->request->getPostGet('user_account');
        $user_password = sha1($this->request->getPostGet('user_passowrd'));
        $user_name = $this->request->getPostGet('user_name');
        $user_gender = $this->request->getPostGet('user_gender');
        $user_phone = $this->request->getPostGet('user_phone');
        $data = [
            'user_account' => $user_account,
            'user_password' => $user_password,
            'user_name' => $user_name,
            'user_gender' => $user_gender,
            'user_phone' => $user_phone,
        ];
        if($this->model->isUser($user_account)){
            return json_encode(['status' => 'fail','message'=>"使用者帳號已存在"]);
        }else{
            if ($this->model->save($data)) {
                return json_encode(['status' => 'success','message'=>"註冊成功"]);
            } else {
                return json_encode(['status' => 'fail','message'=>"註冊失敗"]);
            }
        }
    }
}
