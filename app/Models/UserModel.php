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
    ];
    /**
     * @param [*] 判斷是否存在使用者
     * @param $user_account
     * @return boolean
     */
    public function isUser($user_account)
    {
       $result =  $this->where('user_account', $user_account)->first();
       if($result){
            return true;
       }else{
            return false;
       }
    }
}
