<?php

namespace App\Controllers;

use App\Models\UserModel;

class UserController extends BaseController
{
    protected $session;
    protected $model;
    protected $email_conf;
    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->session->start();
        $this->model = new UserModel();
        $this->email_conf = \Config\Services::email();
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
                $response =  [
                    'status' => 'success', 
                    'message' => '修改密碼成功，請重新登入'
                ];
            } else {
                $response =  [
                    'status' => 'fail', 
                    'message' => '修改密碼失敗'
                ];
            }
        } else {
            $response =  [
                'status' => 'fail', 
                'message' => '原密碼輸入錯誤'
            ];
        }

        return $this->response->setJSON($response); 
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

    public function sendMail()
    {
        $to = $this->request->getVar('mailTo');
        $account = $this->request->getVar('account');
        $isEmail =  $this->model->where('user_email',$to)->where('user_account',$account)->first();
        if($isEmail){
            $subject = "PetForU.com 找回密碼專信";
            $email = \Config\Services::email();
            $email->setTo($to);
            $email->setFrom('your mail', 'PetForU.com');
            $str="QWERTYUIOPASDFGHJKLZXCVBNM1234567890qwertyuiopasdfghjklzxcvbnm";
            str_shuffle($str);
            $new_password=sha1(substr(str_shuffle($str),26,10));
            $changePassword =  $this->model->update($isEmail['user_id'],['user_password'=>sha1($new_password)]);
            $message = "您好! 以下為您的新密碼,請登入後再進行密碼更改之動作。";
            $message.="新密碼為 : $new_password";
            $email->setSubject($subject);
            $email->setMessage($message);
            if ($email->send()) 
            {
                $response = [
                    'status'=>'success',
                    'message'=>'發送成功，請至您的信箱查看新密碼，即將為您跳轉至登入頁面'
                ];
            } 
            else 
            {
                $response = [
                    'status'=>'fail',
                    'message'=>'信件發送失敗，請檢查您的email有無錯誤!'
                ];
            }
        }else{
            $response = [
                'status'=>'fail',
                'message'=>'信件發送失敗，請確認您是否有註冊此帳號或在別的帳號使用過此email!'
            ];
        }
        return $this->response->setJSON($response);
       
       
    }
}
