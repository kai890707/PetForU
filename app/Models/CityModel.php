<?php

namespace App\Models;

use CodeIgniter\Model;

class CityModel extends Model
{
    protected $table = 'city';
    protected $primaryKey = 'city_id';
    // protected $returnType = 'array';
    protected $allowedFields = [
        'city_name',
    ];

    public function getAllCity()
    {
        return $this->findAll();
    }
}
