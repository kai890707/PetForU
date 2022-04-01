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
        $registerData = $this->request->getVar();
        $user_account = $this->request->getPostGet('user_account');
        if ($this->model->isUser($user_account)) {
            return json_encode(['status' => 'fail', 'message' => "使用者帳號已存在"]);
        } else {
            if ($this->model->insertRegister($registerData)) {
                return json_encode(['status' => 'success', 'message' => "註冊成功"]);
            } else {
                return json_encode(['status' => 'fail', 'message' => "註冊失敗"]);
            }
        }
    }
}
