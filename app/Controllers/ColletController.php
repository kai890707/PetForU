<?php

namespace App\Controllers;

use App\Models\ColletModel;

class ColletController extends BaseController
{
    protected $session;
    protected $model;
    protected $db;
    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->session->start();
        $this->model = new ColletModel();
        $this->db = db_connect();
    }

    public function insertPetCollet()
    {
        $user_id = $this->session->get('user_id');
        $pet_id = $this->request->getPostGet('pet_id');
        $data = [
            'user_id' => $user_id,
            'pet_id' => $pet_id,
        ];
        if ($user_id == null || $user_id == "") {
            $response = [
                'status' => 'fail',
                'message' => '您尚未登入，請登入後再進行操作!'
            ];
        } else {
            if ($this->model->save($data)) {
                $response = [
                    'status' => 'success',
                    'message' => "收藏成功",
                ];
            } else {
                $response = [
                    'status' => 'fail',
                    'message' => "收藏失敗",
                ];
            }
        }

        return $this->response->setJSON($response);
    }

    public function selectPetCollet()
    {
        $user_id = $this->session->get('user_id');
        $builder = $this->db->table('collet');
        $builder->select('collet.collet_id ,pet.* , city.city_name');
        $builder->join('pet', 'pet.pet_id = collet.pet_id');
        $builder->join('city', 'city.city_id = pet.city_id');
        $builder->where('collet.user_id', $user_id);
        $query = $builder->get()->getResult();
        return $this->response->setJSON($query);
    }

    public function deletePetCollet()
    {
        $user_id = $this->session->get('user_id');
        $pet_id = $this->request->getPostGet('pet_id');
        $result = $this->model->where('user_id', $user_id)->where('pet_id', $pet_id)->delete();

        if ($result) {
            $response = [
                'status' => 'success',
                'message' => "刪除成功",
            ];
        } else {
            $response = [
                'status' => 'fail',
                'message' => "刪除失敗",
            ];
        }
        return $this->response->setJson($response);
    }
}
