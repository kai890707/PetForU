<?php

namespace App\Controllers;

use App\Models\UserModel;

class RegisterController extends BaseController
{
    public function creatRegister()
    {
        $user_account = $this->request->getPostGet('user_account');
        $user_password = sha1($this->request->getPostGet('user_passowrd'));
        $user_name = $this->request->getPostGet('user_name');
        $user_gender = $this->request->getPostGet('user_gender');
        $user_phone = $this->request->getPostGet('user_phone');
        $user_photo = $this->request->getPostGet('user_photo');
        $model = new UserModel();

        //deal with image
        if ($user_photo != '') {
            if ($user_photo->isValid() && !$user_photo->hasMoved()) {
                $imageName = $user_photo->getRandoName();
                $user_photo->move('Image/', $imageName);
                $user_photo = $imageName;
            }
        }

        $data = [
            'user_account' => $user_account,
            'user_password' => $user_password,
            'user_name' => $user_name,
            'user_gender' => $user_gender,
            'user_phone' => $user_phone,
            'user_photo' => $user_photo,
        ];

        if ($model->save($data)) {
            return json_encode(['registerStatus' => 'success']);
        } else {
            return json_encode(['registerStatus' => 'fail']);
        }
    }
}
