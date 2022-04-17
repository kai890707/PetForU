<?php

namespace App\Models;

use CodeIgniter\Model;

class PublishedCollectModel extends Model
{
    protected $table = 'publishedcollect';
    protected $primaryKey = 'p_collect_id';
    // protected $returnType = 'array';
    protected $allowedFields = [
        'user_id',
        'pulished_id',
    ];
    /**
     * @param [*] 找尋user跟動物是否存在收藏關系
     */
    public function isCollect($user_id, $published_id)
    {
        $r = $this->where('user_id', $user_id)->where('pulished_id', $published_id)->first();
        return $r;
    }
}
