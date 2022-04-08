<?php

namespace App\Controllers;

use App\Models\PublishedModel;

class PublishedController extends BaseController
{
    protected $model;
    protected $session;
    public function __construct()
    {
        $this->model = new PublishedModel();
        $this->session = \Config\Services::session();
        $this->session->start();
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
        $publish_photo = $this->request->getFile('publish_photo');
        $re_publish_photo = $publish_photo->getName();
        $user_id = $this->session->get('user_id');
        $city_id = $this->session->get('city_id');
        $getDate = date("Y-m-d");
        /** 獲取表單資料 end*/
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
        $result = $this->model->where('user_id', $user_id)->findAll();
        return $this->response->setJSON($result);
    }
}
