<?php

namespace App\Models;

use CodeIgniter\Model;

class MemberModel extends Model
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
}
