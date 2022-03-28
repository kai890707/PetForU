<?php

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'user_id';
    protected $allowedFields = ['user_id', 'user_account', 'user_password', 'user_gender', 'user_phone', 'user_photo'];
}
