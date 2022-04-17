<?php

namespace App\Controllers;

use App\Models\PublishedModel;

class PublishedController extends BaseController
{
    protected $model;
    protected $session;
    protected $db;
    public function __construct()
    {
        $this->model = new PublishedModel();
        $this->session = \Config\Services::session();
        $this->session->start();
        $this->db = db_connect();
    }

    public function createPublish()
    {
        /** 獲取表單資料 start*/
        $publish_name = $this->request->getPostGet('publish_name');
        $publish_kind = $this->request->getPostGet('publish_kind');
        $publish_variet = $this->request->getPostGet('publish_variet');
        $publish_gender = $this->request->getPostGet('publish_gender');
        $publish_bodytype = $this->request->getPostGet('publish_bodytype');
        $publish_colour = $this->request->getPostGet('publish_colour');
        $publish_age = $this->request->getPostGet('publish_age');
        $publish_sterilization = $this->request->getPostGet('publish_sterilization');
        $publish_bacterin = $this->request->getPostGet('publish_bacterin');
        $publish_remark = $this->request->getPostGet('publish_remark');
        $city_id = $this->request->getPostGet('city_id');
        $publish_photo = $this->request->getFile('publish_photo');
        $re_publish_photo = $publish_photo->getName();
        $user_id = $this->session->get('user_id');

        $getDate = date("Y-m-d");
        /** 獲取表單資料 end*/


        $dataArray = array();
        array_push(
            $dataArray,
            $publish_name,
            $publish_kind,
            $publish_variet,
            $publish_gender,
            $publish_bodytype,
            $publish_colour,
            $publish_age,
            $publish_sterilization,
            $publish_bacterin,
            $publish_remark,
        );
        for ($i = 0; $i < count($dataArray); $i++) {
            if ($dataArray[$i] == '') {
                $dataArray[$i] = '無';
            }
        }

        $temp = explode(".", $re_publish_photo);
        $newfilename = round(microtime(true)) . '.' . end($temp);

        if ($re_publish_photo == "") {
            $data = [
                'published_name' => $dataArray[0],
                'published_kind' => $dataArray[1],
                'published_variet' => $dataArray[2],
                'published_gender' => $dataArray[3],
                'published_bodytype' => $dataArray[4],
                'published_colour' => $dataArray[5],
                'published_age' => $dataArray[6],
                'published_sterilization' => $dataArray[7],
                'published_bacterin' => $dataArray[8],
                'published_status' => "無",
                'published_remark' => $dataArray[9],
                'published_createDate' => $getDate,
                'published_photo' => 'assets/img/custom/main.png',
                'user_id' => $user_id,
                'city_id' => $city_id,
            ];
        } else {
            $temp = explode(".", $re_publish_photo);
            $newfilename = round(microtime(true)) . '.' . end($temp);
            if ($publish_photo->move("Image", $newfilename)) {
                $ImageData = "image" . "/" . $newfilename;
                $data = [
                    'published_name' => $dataArray[0],
                    'published_kind' => $dataArray[1],
                    'published_variet' => $dataArray[2],
                    'published_gender' => $dataArray[3],
                    'published_bodytype' => $dataArray[4],
                    'published_colour' => $dataArray[5],
                    'published_age' => $dataArray[6],
                    'published_sterilization' => $dataArray[7],
                    'published_bacterin' => $dataArray[8],
                    'published_status' => "無",
                    'published_remark' => $dataArray[9],
                    'published_photo' => $ImageData,
                    'published_createDate' => $getDate,
                    'user_id' => $user_id,
                    'city_id' => $city_id,
                ];
            } else {
                $response = [
                    'status' => 'fail',
                    'message' => "圖片新增失敗",
                ];
                return $this->response->setJSON($response);
            }
        }

        $result = $this->model->insert($data);
        if ($result) {
            $response = [
                'status' => 'success',
                'message' => "新增成功",
            ];
        } else {
            $response = [
                'status' => 'fail',
                'message' => "新增失敗",
            ];
        }
        return $this->response->setJSON($response);
    }
    public function editPublish()
    {
        $published_id = $this->request->getPostGet('published_id');
        $publish_name = $this->request->getPostGet('publish_name');
        $publish_kind = $this->request->getPostGet('publish_kind');
        $publish_variet = $this->request->getPostGet('publish_variet');
        $publish_gender = $this->request->getPostGet('publish_gender');
        $publish_bodytype = $this->request->getPostGet('publish_bodytype');
        $publish_colour = $this->request->getPostGet('publish_colour');
        $publish_age = $this->request->getPostGet('publish_age');
        $publish_sterilization = $this->request->getPostGet('publish_sterilization');
        $publish_bacterin = $this->request->getPostGet('publish_bacterin');
        $publish_remark = $this->request->getPostGet('publish_remark');
        $publish_photo = $this->request->getFile('publish_photo');
        $city_id = $this->request->getPostGet('city_id');
        $re_publish_photo = $publish_photo->getName();

        $dataArray = array();
        array_push(
            $dataArray,
            $publish_name,
            $publish_kind,
            $publish_variet,
            $publish_gender,
            $publish_bodytype,
            $publish_colour,
            $publish_age,
            $publish_sterilization,
            $publish_bacterin,
            $publish_remark,
            $city_id,
        );
        for ($i = 0; $i < count($dataArray); $i++) {
            if ($dataArray[$i] == '') {
                $dataArray[$i] = '無';
            }
        }

        if ($re_publish_photo == "") {
            $data = [
                'published_name' => $dataArray[0],
                'published_kind' => $dataArray[1],
                'published_variet' => $dataArray[2],
                'published_gender' => $dataArray[3],
                'published_bodytype' => $dataArray[4],
                'published_colour' => $dataArray[5],
                'published_age' => $dataArray[6],
                'published_sterilization' => $dataArray[7],
                'published_bacterin' => $dataArray[8],
                'published_status' => "無",
                'published_remark' => $dataArray[9],
                'city_id' => $city_id,

            ];
        } else {
            $temp = explode(".", $re_publish_photo);
            $newfilename = round(microtime(true)) . '.' . end($temp);
            if ($publish_photo->move("Image", $newfilename)) {
                $ImageData = "image" . "/" . $newfilename;
                $data = [
                    'published_name' => $dataArray[0],
                    'published_kind' => $dataArray[1],
                    'published_variet' => $dataArray[2],
                    'published_gender' => $dataArray[3],
                    'published_bodytype' => $dataArray[4],
                    'published_colour' => $dataArray[5],
                    'published_age' => $dataArray[6],
                    'published_sterilization' => $dataArray[7],
                    'published_bacterin' => $dataArray[8],
                    'published_status' => "無",
                    'published_remark' => $dataArray[9],
                    'published_photo' => $ImageData,
                    'city_id' => $city_id,
                ];
            } else {
                $response = [
                    'status' => 'fail',
                    'message' => "圖片新增失敗",
                ];
                return $this->response->setJSON($response);
            }
        }

        if ($this->model->update($published_id, $data)) {
            $response = [
                'status' => 'success',
                'message' => "修改成功",
            ];
        } else {
            $response = [
                'status' => 'fail',
                'message' => "修改失敗",
            ];
        }
        return $this->response->setJSON($response);
    }
    public function deletePublish()
    {
        $user_id = $this->session->get('user_id');
        $published_id = $this->request->getPostGet('published_id');
        $result = $this->model->where('published_id', $published_id)->delete();

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

    public function selectPublish()
    {
        $user_id = $this->session->get('user_id');
        $builder = $this->db->table('published');
        $builder->select('published.* , city.city_name');
        $builder->join('city', 'city.city_id = published.city_id');
        $builder->where('published.published_id',  $user_id);
        $query = $builder->get()->getResult();
        return $this->response->setJSON($query);
    }

    public function loadAllPublishData()
    {
        $user_id = $this->session->get('user_id');
        if ($user_id == null || $user_id == "") {
            $response = [
                'status' => 'fail',
                'message' => '您尚未登入，請登入後再進行操作!'
            ];
            return $this->response->setJSON($response);
        }

        $builder = $this->db->table('published');
        $builder->select('user.user_name,user.user_gender, user.user_phone,user.user_email,user. user_photo,published.* , city.city_name');
        $builder->join('user', 'user.user_id = published.user_id');
        $builder->join('city', 'city.city_id = published.city_id');
        $query = $builder->get()->getResult();
        return $this->response->setJSON($query);
    }


    public function getIdSelectPublish()
    {
        $user_id = $this->session->get('user_id');
        if ($user_id == null || $user_id == "") {
            $response = [
                'status' => 'fail',
                'message' => '您尚未登入，請登入後再進行操作!'
            ];
            return $this->response->setJSON($response);
        }

        $published_id = $this->request->getPostGet('published_id');
        $builder = $this->db->table('published');
        $builder->select('user.user_name,user.user_gender, user.user_phone,user.user_email,user. user_photo,published.* , city.city_name');
        $builder->join('user', 'user.user_id = published.user_id');
        $builder->join('city', 'city.city_id = published.city_id');
        $builder->where('published.published_id',  $published_id);
        $query = $builder->get()->getResult();
        return $this->response->setJSON($query);
    }

    public function conditionSelect()
    {
        $user_id = $this->session->get('user_id');
        if ($user_id == null || $user_id == "") {
            $response = [
                'status' => 'fail',
                'message' => '您尚未登入，請登入後再進行操作!'
            ];
            return $this->response->setJSON($response);
        }

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


        $builder = $this->db->table('published');
        $builder->select('published.* , city.city_name');
        $builder->join('city', 'city.city_id = published.city_id');
        $builder->where($dataArray[0] == 'all' ? 'published.city_id !=' : 'published.city_id', $dataArray[0] == 'all' ? NULL : $dataArray[0]);
        $builder->where($dataArray[1] == 'all' ? 'published.published_kind !=' : 'published.published_kind', $dataArray[1] == 'all' ? NULL : $dataArray[1]);
        $builder->where($dataArray[2] == 'all' ? 'published.published_bodytype !=' : 'published.published_bodytype', $dataArray[2] == 'all' ? NULL : $dataArray[2]);
        $builder->where($dataArray[3] == 'all' ? 'published.published_gender !=' : 'published.published_gender', $dataArray[3] == 'all' ? NULL : $dataArray[3]);
        $builder->where($dataArray[4] == 'all' ? 'published.published_age !=' : 'published.published_age', $dataArray[4] == 'all' ? NULL : $dataArray[4]);
        $builder->where($dataArray[5] == 'all' ? 'published.published_sterilization !=' : 'published.published_sterilization', $dataArray[5] == 'all' ? NULL : $dataArray[5]);
        $builder->where($dataArray[6] == 'all' ? 'published.published_bacterin !=' : 'published.published_bacterin', $dataArray[6] == 'all' ? NULL : $dataArray[6]);
        $query = $builder->get()->getResult();
        return $this->response->setJSON($query);
    }
}
