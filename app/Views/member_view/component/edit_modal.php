<!-- Modal -->
<div class="modal fade" id="editPostModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title font-weight-bold" id="exampleModalLongTitle">修改寵物資訊</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            
        </div>
        <form id="post-edit-form">
            <div class="modal-body">
                <p><span class="text-danger">*</span>為必填欄位</p>
                <div class="form-group row">
                    <label for="publish_name" class="col-sm-5 col-form-label"><span class="text-danger">*</span>寵物名字</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="publish_name"name="publish_name" placeholder="小黑">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="publish_kind" class="col-sm-5 col-form-label"><span class="text-danger">*</span>寵物類型</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="publish_kind" name="publish_kind" placeholder="狗">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="publish_variet" class="col-sm-5 col-form-label"><span class="text-danger">*</span>寵物品種</label>
                    <div class="col-sm-7">
                    <input type="text" class="form-control" id="publish_variet" name="publish_variet" placeholder="柯基">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="publish_gender" class="col-sm-5 col-form-label"><span class="text-danger">*</span>寵物性別</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="publish_gender"name="publish_gender" placeholder="(男生、女生)">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="publish_bodytype" class="col-sm-5 col-form-label"><span class="text-danger">*</span>寵物體型</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="publish_bodytype" name="publish_bodytype" placeholder="(大型、中型、小型)">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="publish_colour" class="col-sm-5 col-form-label"><span class="text-danger">*</span>寵物毛色</label>
                    <div class="col-sm-7">
                    <input type="text" class="form-control" id="publish_colour" placeholder="金"  name="publish_colour">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="publish_age" class="col-sm-5 col-form-label"><span class="text-danger">*</span>寵物年紀</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="publish_age" placeholder="5" name="publish_age">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="publish_sterilization" class="col-sm-5 col-form-label"><span class="text-danger">*</span>是否絕育</label>
                    <div class="col-sm-7">
                        <select class="form-control" name="publish_sterilization">
                            <option value="yes">是</option>
                            <option value="no">否</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="publish_sterilization" class="col-sm-5 col-form-label"><span class="text-danger">*</span>是否施打狂犬病疫苗</label>
                    <div class="col-sm-7">
                        <select class="form-control form-control" name="publish_bacterin">
                            <option value="yes">是</option>
                            <option value="no">否</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="city_id" class="col-sm-5 col-form-label"><span class="text-danger">*</span>所在地</label>
                    <div class="col-sm-7">
                        <select class="form-control form-control"  id="city_id" name="city_id">
                            <option value="1">基隆市</option>
                            <option value="2">臺北市</option>
                            <option value="3">新北市</option>
                            <option value="4">桃園縣</option>
                            <option value="5">桃園市</option>
                            <option value="6">新竹市</option>
                            <option value="7">新竹縣</option>
                            <option value="8">苗栗縣</option>
                            <option value="9">臺中市</option>
                            <option value="10">彰化縣</option>
                            <option value="11">彰化市</option>
                            <option value="12">南投縣</option>
                            <option value="13">雲林縣</option>
                            <option value="14">嘉義市</option>
                            <option value="15">嘉義縣</option>
                            <option value="16">臺南市</option>
                            <option value="17">高雄市</option>
                            <option value="18">屏東縣</option>
                            <option value="19">屏東市</option>
                            <option value="20">臺東縣</option>
                            <option value="21">花蓮縣</option>
                            <option value="22">宜蘭縣</option>
                            <option value="23">澎湖縣</option>
                            <option value="24">金門縣</option>
                            <option value="25">連江縣</option>
                        </select>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                <label for="publish_remark" class="col-sm-12 col-form-label"><span class="text-danger">*</span>寵物備註</label>
                    <div class="col-sm-12">
                        <textarea class="form-control" id="publish_remark" rows="3" name="publish_remark"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="publish_remark" class="col-sm-12 col-form-label"><span class="text-danger">*</span>寵物圖片</label>
                   
                    <!-- <form method="post" id="image-form"> -->
                        <input type="file" name="publish_photo" class="pet_file" accept="image/*">
                        <div class="input-group col-sm-12">
                            <input type="text" class="form-control" disabled placeholder="Upload File" id="petimgfile">
                            <div class="input-group-append">
                                <button type="button" class="pet_browse btn btn-primary">上傳</button>
                            </div>
                        </div>
                    <!-- </form> -->
                    <div class=" col-sm-12">
                        <img src="" id="pet_preview" class="img-thumbnail">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>
                <button id="edit-submit" type="submit" class="btn btn-primary">修改</button>
            </div>
        </form>
        </div>
    </div>
</div>
<!-- Modal end -->