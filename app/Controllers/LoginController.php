<?php

namespace App\Controllers;

use App\Models\UserModel;


class LoginController extends BaseController
{
    public function Login()
    {
        $user_account = $this->request->getPostGet('user_account');
        $user_password = $this->request->getPostGet('user_passowrd');
        $model = new UserModel();
        $session = session();
        $data = [
            'user_account' => $user_account,
            'user_password' => $user_password,
        ];
        // echo sha1($user_password);
        $loginAns = $model->where('user_account', $user_account)->where('user_password', sha1($user_password))->first();
        // return json_encode($loginAns);
        if ($loginAns) {
            $session->set('user_id', $loginAns['user_id']);
            $session->set('user_account', $loginAns['user_name']);
            $session->set('user_password', $loginAns['user_password']);
            $session->set('user_name', $loginAns['user_name']);
            $session->set('user_gender', $loginAns['user_gender']);
            $session->set('user_phone', $loginAns['user_phone']);
            $session->set('user_photo', $loginAns['user_photo']);

            return json_encode(['loginStatus' => 'success', 'data' => [$loginAns]]);
        } else {
            return json_encode(['loginStatus' => 'fail', 'data' => [$loginAns]]);
        }
    }

    public function Logout()
    {
        $session = session();
        $session->destroy();
        return view('index');
    }
}
