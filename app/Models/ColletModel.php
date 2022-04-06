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

    /**
     * @param [*] 找尋user跟動物是否存在收藏關系
     */
    public function isCollect($user_id,$id)
    {
        $r = $this->where('user_id',$user_id)->where('pet_id',$id)->first();
        return $r;
    }
}