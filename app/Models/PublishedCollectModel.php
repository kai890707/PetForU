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
}
