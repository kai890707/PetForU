<?php

namespace App\Models;

use CodeIgniter\Model;

class PublishedModel extends Model
{
    protected $table = 'published';
    protected $primaryKey = 'published_id';
    protected $allowedFields = [
        'published_name',
        'published_kind',
        'published_variet',
        'published_gender',
        'published_bodytype',
        'published_colour',
        'published_age',
        'published_sterilization',
        'published_bacterin',
        'published_status',
        'published_remark',
        'published_photo',
        'published_createDate',
        'user_id',
        'city_id',
    ];
}
