<?php

namespace App\Controllers;

use App\Models\MemberModel;

class UserController extends BaseController
{
    public function index()
    {
        $model = new MemberModel();


        $data = [
            'user_account' => '123',
            'user_password' => '456',
            'user_name' => 'alan',
            'user_gender' => '女',
            'user_phone' => '09123324324',
            'user_photo' => 'asd',
        ];

        // $model->whereIn('user_id', [1, 2])
        //     ->set(['user_name' => 'bbb'])
        //     ->update();

        $ans = $model->where('user_name', 'alan')->findAll();
        return json_encode($ans);
        // $model->save($data);
        // return $data;
        // return 'success';
    }
}
