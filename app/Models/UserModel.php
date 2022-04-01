<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'user_id';
    // protected $returnType = 'array';
    protected $allowedFields = [
        'user_id',
        'user_account',
        'user_password',
        'user_name',
        'user_gender',
        'user_phone',
        'user_photo',
        'user_email',
    ];
    /**
     * @param [*] 判斷是否存在使用者
     * @param $user_account
     * @return boolean
     */
    public function isUser($user_account)
    {
        $result =  $this->where('user_account', $user_account)->first();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function insertRegister($data)
    {
        $request = [
            'user_account' => $data['user_account'],
            'user_password' => sha1($data['user_password']),
            'user_name' => $data['user_name'],
            'user_gender' => $data['user_gender'],
            'user_phone' => $data['user_phone'],
            'user_email' => $data['user_email'],
        ];
        if ($this->save($request)) {
            return true;
        } else {
            return false;
        }
    }

    public function updateUserInformation($user_id, $data)
    {
        $request = [
            'user_gender' => $data['user_gender'],
            'user_photo' => $data['user_photo'],
            'user_email' => $data['user_email'],
        ];
        if ($this->update($user_id, $request)) {
            return true;
        } else {
            return false;
        }
    }
}
