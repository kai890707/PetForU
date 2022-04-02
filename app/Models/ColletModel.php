<?php

namespace App\Models;

use CodeIgniter\Model;
class ColletModel extends Model
{
    protected $table = 'collet';
    protected $primaryKey = 'collet_id';
    // protected $returnType = 'array';
    protected $allowedFields = [
        'user_id',
        'pet_id',
    ];
    
}