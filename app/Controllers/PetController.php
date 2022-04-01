<?php

namespace App\Controllers;

use App\Models\PetModel;

class PetController extends BaseController
{
    public function loadPetData()
    {
        $city_id = $this->request->getPostGet('city_id');
        $model = new PetModel();
        $result = $model->where('city_id', $city_id)->findAll();
        return json_encode($result);
    }

    //條件搜尋
    public function conditionSelectPet()
    {
        $city_id = $this->request->getPostGet('city_id');
        $pet_kind = $this->request->getPostGet('pet_kind');
        $pet_gender = $this->request->getPostGet('pet_gender');
        $pet_bodytpye = $this->request->getPostGet('pet_bodytype');

        $model = new PetModel();
        $result = $model->where('city_id', $city_id)->where('pet_kind', $pet_kind)->where('pet_gender', $pet_gender)->where('pet_bodytype', $pet_bodytpye)->findAll();
        // print_r($result);
        return json_encode($result);
    }

    
}
