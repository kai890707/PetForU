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
        'city_id',
    ];
}
