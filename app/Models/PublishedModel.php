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
    /**
     * @param [*] 透過id select 流浪動物資訊
     * @param mixed $id [動物id]
     */
    public function selectPublishDataById($id)
    {
        // $builder = $this->db->table('published');
        // $builder->select('published.*,user.user_name,user.user_gender, user.user_phone,user.user_email,user. user_photo,published.* , city.city_name');
        // $builder->join('user', 'user.user_id = published.user_id');
        // $builder->join('city', 'city.city_id = published.city_id');
        // $builder->where('published.published_id',  $published_id);
        // $query = $builder->get()->getResult();

        $r = $this
        ->select('published.*,user.user_name,user.user_gender, user.user_phone,user.user_email,user. user_photo,published.* , city.city_name')
        ->join('user', 'user.user_id = published.user_id')
        ->join('city', 'city.city_id = published.city_id')
        ->where('published_id', $id)->first();
        return $r;
    }
}
