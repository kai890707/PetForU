<?php

namespace App\Controllers;

use App\Models\PublishedModel;

class PublishedController extends BaseController
{
    protected $model;
    public function __construct()
    {
        $this->model = new PublishedModel();
    }
    public function createPublish()
    {
        $session = \Config\Services::session();
        $session->start();
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
        $user_id = $session->get('user_id');
        $getDate = date("Y-m-d");
         /** 獲取表單資料 end*/ 
        $re_publish_photo = $publish_photo->getName();
        $temp = explode(".",$re_publish_photo);
        $newfilename = round(microtime(true)) . '.' . end($temp);

        if($e = $publish_photo->move("image", $newfilename)){
            
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
                    'published_status' =>"無",
                    'published_remark' => $dataArray[9],
                    'published_photo' =>"image/".$newfilename,
                    'published_createDate' => $getDate,
                    'user_id' => $user_id,
            ];
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
        }else{
            $response = [
                'status' => 'fail',
                'message' => "圖片新增失敗",
            ]; 
            return $this->response->setJSON($response);
        } 
           
        
    }
    public function editPublish()
    {
        # code...
    }
    public function deletePublish()
    {
        # code...
    }
}
