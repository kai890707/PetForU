<?php

namespace App\Controllers;

use App\Models\CityModel;

class CityController extends BaseController
{
    protected $model;
    public function __construct()
    {
        $this->model = new CityModel();
    }

    public function getCity()
    {
        $result = $this->model->getAllCity();
        return $this->response->setJSON($result);
    }
}
