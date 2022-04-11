<?php

namespace App\Models;

use CodeIgniter\Model;

class PetModel extends Model
{
    protected $table = 'pet';
    protected $primaryKey = 'pet_id';
    // protected $returnType = 'array';
    protected $allowedFields = [
        'pet_place',
        'pet_kind',
        'pet_variety',
        'pet_gender',
        'pet_bodytype',
        'pet_colour',
        'pet_age',
        'pet_sterilization',
        'pet_bacterin',
        'pet_foundplace',
        'pet_status',
        'pet_remark',
        'pet_caption',
        'pet_opendate',
        'pet_closeddate',
        'pet_shelter_name',
        'pet_photo',
        'pet_address',
        'pet_phone',
        'pet_lat',
        'pet_lng',
        'city_id',
    ];
    /**
     * @param [*] 透過id select 流浪動物資訊
     * @param mixed $id [動物id]
     */
    public function selectPetDataById($id)
    {
        $r = $this->where('pet_id', $id)->first();
        return $r;
    }
    public function selectPetData()
    {
        # code...
    }
}
