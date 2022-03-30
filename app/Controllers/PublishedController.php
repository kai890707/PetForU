<?php

namespace App\Controllers;

use App\Models\PublishedModel;

class PublishedController extends BaseController
{
    public function createPublish()
    {
        $publish_name = $this->request->getPostGet('publish_name');
        $publish_kind = $this->request->getPostGet('publish_kind');
        $publish_variet = $this->request->getPostGet('publish_variet');
        $publish_gender = $this->request->getPostGet('publish_gender');
        $publish_bodytype = $this->request->getPostGet('publish_bodytype');
        $publish_colour = $this->request->getPostGet('publish_colour');
        $publish_age = $this->request->getPostGet('publish_age');
        $publish_sterilization = $this->request->getPostGet('publish_sterilization');
        $publish_bacterin = $this->request->getPostGet('publish_bacterin');
        $publish_status = $this->request->getPostGet('publish_status');
        $publish_remark = $this->request->getPostGet('publish_remark');
        $publish_photo = $this->request->getPostGet('publish_photo');
        $user_id = $this->request->getPostGet('user_id');
        $getDate = date("Y-m-d");

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
            $publish_status,
            $publish_remark,
            $publish_photo,
        );

        for ($i = 0; $i < count($dataArray); $i++) {
            if ($dataArray[$i] == '') {
                $dataArray[$i] = '無';
            }
            // echo $dataArray[$i];
        }
        $model = new PublishedModel();

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
            'published_status' => $dataArray[9],
            'published_remark' => $dataArray[10],
            'published_photo' => $dataArray[11],
            'published_createDate' => $getDate,
            'user_id' => $user_id,
        ];

        $result = $model->save($data);

        if ($result) {
            return json_encode(['status' => 'success', 'message' => '新增成功']);
        } else {
            return json_encode(['status' => 'success', 'message' => '新增失敗']);
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
