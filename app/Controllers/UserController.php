<?php

namespace App\Controllers;

use App\Models\UserModel;

class UserController extends BaseController
{
    protected $session;
    protected $model;
    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->session->start();
        $this->model = new UserModel();
    }
    public function updateUserPhoto()
    {
        $user_id = $this->request->getPostGet('user_id');
        $user_photo = $this->request->getPostGet('user_photo');
        //deal with image
        if ($user_photo != '') {
            if ($user_photo->isValid() && !$user_photo->hasMoved()) {
                $imageName = $user_photo->getRandoName();
                $user_photo->move('Image/', $imageName);
                $user_photo = $imageName;
                $data = [
                    'user_photo' => $user_photo,
                ];
                $ans = $this->model->update($user_id, $data);
                if ($ans) {
                    return json_encode(['status' => 'success', 'message' => '大頭貼修改成功']);
                } else {
                    return json_encode(['status' => 'fail', 'message' => '大頭貼修改失敗']);
                }
            }
        } else {
            return json_encode(['updateStatus' => 'error', 'message' => '找不到檔案']);
        }
    }

    public function updateUserData()
    {
        $user_id = $this->request->getPostGet('user_id');
    }
    public function updateUserPassword()
    {
        $user_password = $this->request->getPostGet('user_password');
        $updatePassword = $this->request->getPostGet('updatePassword');
        $user_id = $this->session->get('user_id');
        $result = $this->model->where('user_id', $user_id)->where('user_password', sha1($user_password))->first();
        if ($result) {
            $data = [
                'user_password' => sha1($updatePassword),
            ];
            $updatePasswordAns = $this->model->update($user_id, $data);
            if ($updatePasswordAns) {
                $this->session->destroy();
                return json_encode(['status' => 'success', 'message' => '修改密碼成功，請重新登入']);
            } else {
                return json_encode(['status' => 'fail', 'message' => '修改密碼失敗']);
            }
        } else {
            return json_encode(['status' => 'error', 'message' => '原密碼輸入錯誤']);
        }
    }
}
