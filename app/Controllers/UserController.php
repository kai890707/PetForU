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
    public function updateUserData()
    {
        $data = $this->request->getVar();
        $user_id = $this->session->get('user_id');
        $user_photo = $this->request->getFile('user_photo');
        $re_user_photo = $user_photo->getName();
        $temp = explode(".",$re_user_photo);
        $newfilename = round(microtime(true)) . '.' . end($temp);

        if($user_photo->move("userImage", $newfilename)){
            $ImageData = 'userImage/'.$newfilename;
        }else{
            $ImageData = '';
        }
        
        $updateData = [
            'user_name' => $data['user_name'],
            'user_phone' => $data['user_phone'],
            'user_photo' => $ImageData,
        ];

        if ($this->model->updateUserInformation($user_id, $updateData)) {
            return json_encode(['status' => 'success', 'message' => '資料修改成功']);
        } else {
            return json_encode(['status' => 'fail', 'message' => '資料修改失敗']);
        }
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
            return json_encode(['status' => 'fail', 'message' => '原密碼輸入錯誤']);
        }
    }
    public function getUserInfo()
    {
        $info = $this->model->getUserInfo();
        if($info){
            $response = [
                'status' => 'success',
                'message' => "get Ok",
                'data'=>$info
            ];
        }else{
            $response = [
                'status' => 'fail',
                'message' => "data is null",
            ];
        }
         
        return $this->response->setJSON($response);
    }
}
