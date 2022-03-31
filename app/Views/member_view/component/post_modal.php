<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title font-weight-bold" id="exampleModalLongTitle">開始刊登</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            
        </div>
        <form id="post-pet-form">
            <div class="modal-body">
                <p><span class="text-danger">*</span>為必填欄位</p>
                <div class="form-group row">
                    <label for="publish_name" class="col-sm-5 col-form-label"><span class="text-danger">*</span>寵物名字</label>
                    <div class="col-sm-7">
                        <input type="password" class="form-control" id="publish_name" placeholder="小黑">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="publish_kind" class="col-sm-5 col-form-label"><span class="text-danger">*</span>寵物類型</label>
                    <div class="col-sm-7">
                        <input type="password" class="form-control" id="publish_kind" placeholder="狗">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="publish_variet" class="col-sm-5 col-form-label"><span class="text-danger">*</span>寵物品種</label>
                    <div class="col-sm-7">
                    <input type="password" class="form-control" id="publish_variet" placeholder="柯基">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="publish_gender" class="col-sm-5 col-form-label"><span class="text-danger">*</span>寵物性別</label>
                    <div class="col-sm-7">
                        <input type="password" class="form-control" id="publish_gender" placeholder="(男生、女生)">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="publish_bodytype" class="col-sm-5 col-form-label"><span class="text-danger">*</span>寵物體型</label>
                    <div class="col-sm-7">
                        <input type="password" class="form-control" id="publish_bodytype" placeholder="(大型、中型、小型)">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="publish_colour" class="col-sm-5 col-form-label"><span class="text-danger">*</span>寵物毛色</label>
                    <div class="col-sm-7">
                    <input type="password" class="form-control" id="publish_colour" placeholder="金">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="publish_age" class="col-sm-5 col-form-label"><span class="text-danger">*</span>寵物年紀</label>
                    <div class="col-sm-7">
                        <input type="password" class="form-control" id="publish_age" placeholder="5">
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
                <label for="publish_remark" class="col-sm-12 col-form-label"><span class="text-danger">*</span>寵物備註</label>
                    <div class="col-sm-12">
                        <textarea class="form-control" id="publish_remark" rows="3" name="publish_remark"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="publish_remark" class="col-sm-12 col-form-label"><span class="text-danger">*</span>寵物圖片</label>
                   
                    <form method="post" id="image-form">
                        <input type="file" name="petimg[]" class="pet_file" accept="image/*">
                        <div class="input-group col-sm-12">
                            <input type="text" class="form-control" disabled placeholder="Upload File" id="petimgfile">
                            <div class="input-group-append">
                                <button type="button" class="pet_browse btn btn-primary">上傳</button>
                            </div>
                        </div>
                    </form>
                    <div class=" col-sm-12">
                        <img src="" id="pet_preview" class="img-thumbnail">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>
                <button type="submit" class="btn btn-primary">保存</button>
            </div>
        </form>
        </div>
    </div>
</div>
<!-- Modal end -->