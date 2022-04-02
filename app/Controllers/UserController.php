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
        $updateData=[];
        $data = $this->request->getVar();
        $user_id = $this->session->get('user_id');
        $user_photo = $this->request->getFile('img');
        $re_user_photo = $user_photo->getName();
        if($re_user_photo == ""){
            //圖片無變更
            $updateData = [
                'user_name' => $data['name_input'],
                'user_phone' => $data['phone_input'],
            ];
        }else{
            $temp = explode(".",$re_user_photo);
            $newfilename = round(microtime(true)) . '.' . end($temp);
            if($user_photo->move("UserImage", $newfilename)){
                $ImageData = "/UserImage"."/".$newfilename;
                $updateData = [
                    'user_name' => $data['name_input'],
                    'user_phone' => $data['phone_input'],
                    'user_photo' => $ImageData,
                ];
            }else{
                $response = [
                    'status' => 'fail',
                    'message' => "圖片新增失敗",
                ]; 
                return $this->response->setJSON($response);
            }
        }
        if ($this->model->updateUserInformation($user_id, $updateData)) {
            $response = [
                'status' => 'success',
                'message' => "資料修改成功",
            ]; 
        } else {
            $response = [
                'status' => 'fail',
                'message' => "資料修改失敗",
            ]; 
        }
        return $this->response->setJSON($response); 
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
