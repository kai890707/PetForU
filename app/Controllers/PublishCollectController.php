<?php

namespace App\Controllers;

use App\Models\PublishedCollectModel;

class PublishCollectController extends BaseController
{
    protected $session;
    protected $model;
    protected $db;
    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->session->start();
        $this->model = new PublishedCollectModel();
        $this->db = db_connect();
    }

    public function insertPublishCollect()
    {
        $user_id = $this->session->get('user_id');
        $publish_id = $this->request->getPostGet('publish_id');
        $data = [
            'user_id' => $user_id,
            'publish_id' => $publish_id,
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
        $builder = $this->db->table('publishedcollect');
        $builder->select('publishedcollect .p_collect_id  ,published.* , city.city_name');
        $builder->join('published', 'published.published_id = publishedcollect.published_id');
        $builder->join('city', 'city.city_id = published.city_id');
        $builder->where('publishedcollect.user_id', $user_id);
        $query = $builder->get()->getResult();
        return $this->response->setJSON($query);
    }

    public function deletePetCollet()
    {
        $user_id = $this->session->get('user_id');
        $p_collect_id = $this->request->getPostGet('p_collect_id');
        $result = $this->model->where('user_id', $user_id)->where('p_collect_id', $p_collect_id)->delete();

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
