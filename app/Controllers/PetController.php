<?php

namespace App\Controllers;

use App\Models\PetModel;

class PetController extends BaseController
{
  protected $session;
  protected $model;
  protected $db;
  public function __construct()
  {
    $this->session = \Config\Services::session();
    $this->session->start();
    $this->model = new PetModel();
    $this->db = db_connect();
  }

  public function loadAllData()
  {
    return $this->response->setJson($this->model->findAll());
  }

  public function selectPetDataById()
  {
    $pet_id = $this->request->getPostGet('pet_id');
    $builder = $this->db->table('pet');
    $builder->select('pet.* , city.city_name');
    $builder->join('city', 'city.city_id = pet.city_id');
    $builder->where('pet.pet_id', $pet_id);
    $query = $builder->get()->getResult();

    return $this->response->setJSON($query);

  }

  public function selectPetData()
  {
    $data = $this->request->getVar();
    $dataArray = array();
    $nameFind = array(
      'dog' => '狗',
      'cat' => '貓',
      'all' => 'all',
      'small' => '小型',
      'medium' => '中型',
      'large' => '大型',
      'male' => '男',
      'female' => '女',
      'child' => '幼年',
      'adult' => '成年',
      'yes' => '是',
      'no' => '否',

    );
    array_push(
      $dataArray,
      $data['city_id'],
      $data['pet_kind'],
      $data['pet_bodytype'],
      $data['pet_gender'],
      $data['pet_age'],
      $data['pet_sterilization'],
      $data['pet_bacterin'],
    );

    for ($i = 0; $i < count($dataArray); $i++) {
      if (isset($nameFind[$dataArray[$i]])) {
        $dataArray[$i] = $nameFind[$dataArray[$i]];
      }
    }
    $data = [
      'page_title' => '找浪浪',
      'pets' => $this->model
        ->where($dataArray[0] == 'all' ? 'city_id !=' : 'city_id', $dataArray[0] == 'all' ? NULL : $dataArray[0])
        ->where($dataArray[1] == 'all' ? 'pet_kind !=' : 'pet_kind', $dataArray[1] == 'all' ? NULL : $dataArray[1])
        ->where($dataArray[2] == 'all' ? 'pet_bodytype !=' : 'pet_bodytype', $dataArray[2] == 'all' ? NULL : $dataArray[2])
        ->where($dataArray[3] == 'all' ? 'pet_gender !=' : 'pet_gender', $dataArray[3] == 'all' ? NULL : $dataArray[3])
        ->where($dataArray[4] == 'all' ? 'pet_age !=' : 'pet_age', $dataArray[4] == 'all' ? NULL : $dataArray[4])
        ->where($dataArray[5] == 'all' ? 'pet_sterilization !=' : 'pet_sterilization', $dataArray[5] == 'all' ? NULL : $dataArray[5])
        ->where($dataArray[6] == 'all' ? 'pet_bacterin !=' : 'pet_bacterin', $dataArray[6] == 'all' ? NULL : $dataArray[6])
        ->paginate(12),
      'pager' => $this->model->pager
    ];
    echo view('find_view/find', $data);
  }
}
