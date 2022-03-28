

    <!-- bradcam_area_start -->
    <div class="bradcam_area breadcam_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bradcam_text text-center">
                        <h3>找浪浪</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- bradcam_area_end -->

    <!-- service_area_start  -->
    <div class="service_area">
        <div class="container">
            <form action="">
                <div class="form-row">
                    <div class="form-group col">
                        <label for="type">類型</label>
                        <select class="form-control" id="type">
                            <option value="all">全部</option>
                            <option value="dog">狗</option>
                            <option value="cat">貓</option>
                        </select>
                    </div>
                    <div class="form-group col">
                        <label for="body_type">體型</label>
                        <select class="form-control" id="body_type">
                            <option value="all">全部</option>
                            <option value="small">小型</option>
                            <option value="medium">中型</option>
                            <option value="large">大型</option>
                        </select>
                    </div>
                    <div class="form-group col">
                        <label for="gender">性別</label>
                        <select class="form-control" id="gender">
                            <option value="all">全部</option>
                            <option value="male">男生</option>
                            <option value="female">女生</option>
                        </select>
                    </div>
                    <div class="form-group col">
                        <label for="age">年齡</label>
                        <select class="form-control" id="age">
                            <option value="all">全部</option>
                            <option value="child">幼年</option>
                            <option value="adult">成年</option>
                        </select>
                    </div>
                    <div class="form-group col">
                        <label for="location">所在地</label>
                        <select class="form-control" id="location">
                            <option value="">全台</option>
                            <option value="2">臺北市</option>
                            <option value="3">新北市</option>
                            <option value="4">基隆市</option>
                            <option value="5">宜蘭縣</option>
                            <option value="6">桃園縣</option>
                            <option value="7">新竹縣</option>
                            <option value="8">新竹市</option>
                            <option value="9">苗栗縣</option>
                            <option value="10">臺中市</option>
                            <option value="11">彰化縣</option>
                            <option value="12">南投縣</option>
                            <option value="13">雲林縣</option>
                            <option value="14">嘉義縣</option>
                            <option value="15">嘉義市</option>
                            <option value="16">臺南市</option>
                            <option value="17">高雄市</option>
                            <option value="18">屏東縣</option>
                            <option value="19">花蓮縣</option>
                            <option value="20">臺東縣</option>
                            <option value="21">澎湖縣</option>
                            <option value="22">金門縣</option>
                            <option value="23">連江縣</option>
                        </select>
                    </div>
                    <div class="form-group col">
                        <label for="sterilization">結扎</label>
                        <select class="form-control" id="sterilization">
                            <option value="all">全部</option>
                            <option value="yes">是</option>
                            <option value="no">否</option>
                        </select>
                    </div>
                    <div class="form-group col">
                        <label for="vaccine">狂犬疫苗</label>
                        <select class="form-control" id="vaccine">
                            <option value="all">全部</option>
                            <option value="yes">以施打</option>
                            <option value="no">未施打</option>
                        </select>
                    </div>
                    <div class="form-group col d-flex align-items-end">
                        <a href="#" class="genric-btn info ">搜尋</a>
                    </div>
                </div>
            </form>
            <?= $this->include('find_view/all') ?>
            <!-- <div class="row justify-content-center ">
                
                <div class="col-lg-7 col-md-10">
                    <div class="section_title  mb-95">
                      
                  
                    </div>
                </div>
            </div>
             -->
        </div>
    </div>
    <!-- service_area_end -->

 
    <!-- contact_anipat_end  -->
