

    <!-- bradcam_area_start -->
    <div class="bradcam_area breadcam_bg">
        <div class="container-fluid" style="padding-left: 100px;padding-right:100px;">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bradcam_text text-center">
                        <h3>個人資訊</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- bradcam_area_end -->

    <section class="blog_area single-post-area section-padding">
      <div class="container">   
        
        <div class="row">
            <div class="col-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <div class="row mb-4">
                        <div class="col-md-3 col-12 img-container"><img class="rounded-circle z-depth-2" alt="100x100" src="https://mdbootstrap.com/img/Photos/Avatars/img%20(31).jpg"data-holder-rendered="true" ></div>
                        <div class="col-md-9 col-12 user_profile">
                            <div class="username">123</div>
                            <div>
                                
                            </div>
                        </div>
                            
                    </div>
                    <a class="edit_userprofile nav-link active" id="v-pills-profile-tab"style="background-color:rgba(0,0,0,0) !important;"  data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="true"><i class="ti-pencil-alt2 mr-2"></i>編輯個人簡介</a>
                    <a class="nav-link " id="v-pills-home-tab" style="background-color:rgba(0,0,0,0) !important;" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="false"><i class="ti-unlock mr-2"></i>修改密碼</a>
                    <a class="nav-link" id="v-pills-messages-tab"style="background-color:rgba(0,0,0,0) !important;"  data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false"><i class="fa fa-paw mr-2"></i>浪浪收藏</a>
                    <a class="nav-link" id="v-pills-settings-tab" style="background-color:rgba(0,0,0,0) !important;" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false"><i class="fa fa-folder mr-2"></i>個人刊登</a>
                </div>
            </div>
            <div class="col-9 shdow-lg rounded bg-white">
                <div class="tab-content " id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <div class="p-4 tab_profile">
                            <h3 class="font-weight-bold">我的檔案</h3>
                            <small class="text-muted font-weight-bold">管理你的檔案以保護你的帳戶</small>
                        </div>    
                        <div class="p-4">
                            
                                    <form>
                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-sm-2 col-form-label">使用者名稱</label>
                                            <div class="col-sm-10">
                                                <p class="m-0 d-flex align-items-center">example</p>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <p class=" d-flex align-items-center">example@example.com<button type="button" id="email_change" class="btn btn-outline-secondary ml-3 exchange-btn">變更</button></p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="phone" class="col-sm-2 col-form-label">手機</label>
                                            <div class="col-sm-10">
                                            <p class=" d-flex align-items-center">09****123*<button type="button" id="phone_change"  class="btn btn-outline-secondary ml-3 exchange-btn">變更</button></p>
                                            </div>
                                        </div>
                                        <div class="form-group row ">
                                                <label for="phone" class="col-sm-2 col-form-label">性別</label>
                                                <div class="col-sm-10">
                                                    <div class="custom-control custom-radio mr-2">
                                                        <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                                                        <label class="custom-control-label" for="customRadio1">男性</label>
                                                    </div>
                                                    <div class="custom-control custom-radio mr-2">
                                                        <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                                                        <label class="custom-control-label" for="customRadio2">女性</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio3" name="customRadio" class="custom-control-input">
                                                        <label class="custom-control-label" for="customRadio3">不願透漏</label>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="form-group row ">
                                            <label for="phone" class="col-sm-2 col-form-label">個人照片</label>
                                            <div class="col-sm-10">
                                                <div class="row">
                                                    <div class=" col-sm-6">
                                                        <div id="msg"></div>
                                                        <form method="post" id="image-form">
                                                            <input type="file" name="img[]" class="file" accept="image/*">
                                                            <div class="input-group my-3">
                                                                <input type="text" class="form-control" disabled placeholder="Upload File" id="file">
                                                                <div class="input-group-append">
                                                                    <button type="button" class="browse btn btn-primary">上傳</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class=" col-sm-12">
                                                        <img src="" id="preview" class="img-thumbnail">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                        </div>
                                        <div class="form-group row m-1">
                                            <button type="submit" class="btn btn-outline-success">儲存</button>
                                        </div>
                                    </form>
                                
                            
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <div class="p-4 tab_profile">
                            <h3 class="font-weight-bold">修改密碼</h3>
                            <small class="text-muted font-weight-bold">定期更改密碼可以有效保護你的帳戶</small>
                        </div>    
                        <div class="p-4">    
                            <form>
                                <div class="form-group row">
                                    <label for="before_pass" class="col-sm-5 col-form-label">輸入原有密碼</label>
                                    <div class="col-sm-7">
                                        <input type="password" class="form-control" id="before_pass" placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="after_pass" class="col-sm-5 col-form-label">輸入新密碼</label>
                                    <div class="col-sm-7">
                                        <input type="password" class="form-control" id="after_pass" placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="after_pass_again" class="col-sm-5 col-form-label">再次輸入新密碼</label>
                                    <div class="col-sm-7">
                                    <input type="password" class="form-control" id="after_pass_again" placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group row m-1">
                                    <button type="submit" class="btn btn-outline-success">送出更改</button>
                                </div>
                            </form>
                                
                            
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                        <div class="p-4 tab_profile">  
                            <h3 class="font-weight-bold">浪浪收藏</h3>
                            <small class="text-muted font-weight-bold">管理你所收藏的浪浪資訊</small>
                        </div>    
                        
                        <div class="p-4 row">
                            <div class="col-12  m-2 p-2" >
                                <div class="row mb-3 p-3 shadow rounded collect_content" >
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-8 d-flex align-items-center">
                                                <h4 class="font-weight-bold text-dark text-start m-0">
                                                    <i class="fa fa-paw mr-2"></i>浪浪資訊
                                                </h4>
                                            </div>
                                     
                                        </div>
                                        
                                        
                                        <hr>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-12 d-flex justify-content-center">
                                        <img class="img-fluid img-thumbnail" src="https://asms.coa.gov.tw/amlapp/upload/pic/4a932628-ba81-4540-8afa-14bd48170413_org.jpg" alt="" width="150px" height="100px">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12 text-sm-center mt-sm-2">
                                        <div class="row">
                                            <div class="col-md-3 col-6"><i class="ti-tag mr-2"></i>編號</div>
                                            <div class="col-md-9 col-6 text-md-left">213</div>
                                        </div>
                                        <hr >
                                        <div class="row">
                                            <div class="col-md-3 col-6"><i class="fa fa-venus-mars mr-2" aria-hidden="true"></i>性別</div>
                                            <div class="col-md-9 col-6 text-md-left">213</div>
                                        </div>
                                        <hr >
                                        <div class="row">
                                            <div class="col-md-3 col-6"><i class="fa fa-info mr-2" aria-hidden="true"></i>體型</div>
                                            <div class="col-md-9 col-6 text-md-left">213</div>
                                        </div>
                                        <hr >
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-12 mt-sm-2 border-left">
                                        <div class="row justify-content-start align-items-center mb-2">
                                            <div class="col mb-2 "><button class="btn btn-outline-info">查看詳細資訊</button></div>
                                            <div class="col  mb-2 "><button class="btn btn-outline-danger">結束收藏</button></div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="row mb-3 p-3 shadow rounded collect_content" >
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-8 d-flex align-items-center">
                                                <h4 class="font-weight-bold text-dark text-start m-0">
                                                    <i class="fa fa-paw mr-2"></i>浪浪資訊
                                                </h4>
                                            </div>
                                     
                                        </div>
                                        
                                        
                                        <hr>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-12 d-flex justify-content-center">
                                        <img class="img-fluid img-thumbnail" src="https://asms.coa.gov.tw/amlapp/upload/pic/4a932628-ba81-4540-8afa-14bd48170413_org.jpg" alt="" width="150px" height="100px">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12 text-sm-center mt-sm-2">
                                        <div class="row">
                                            <div class="col-md-3 col-6"><i class="ti-tag mr-2"></i>編號</div>
                                            <div class="col-md-9 col-6 text-md-left">213</div>
                                        </div>
                                        <hr >
                                        <div class="row">
                                            <div class="col-md-3 col-6"><i class="fa fa-venus-mars mr-2" aria-hidden="true"></i>性別</div>
                                            <div class="col-md-9 col-6 text-md-left">213</div>
                                        </div>
                                        <hr >
                                        <div class="row">
                                            <div class="col-md-3 col-6"><i class="fa fa-info mr-2" aria-hidden="true"></i>體型</div>
                                            <div class="col-md-9 col-6 text-md-left">213</div>
                                        </div>
                                        <hr >
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-12 mt-sm-2 border-left">
                                        <div class="row justify-content-start align-items-center mb-2">
                                            <div class="col mb-2 "><button class="btn btn-outline-info">查看詳細資訊</button></div>
                                            <div class="col  mb-2 "><button class="btn btn-outline-danger">結束收藏</button></div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                        <div class="p-4 tab_profile">
                            <div class="row">
                                <div class="col">
                                    <h3 class="font-weight-bold">個人刊登</h3>
                                    <small class="text-muted font-weight-bold">管理你所刊登的寵物資訊</small>
                                </div>
                                <div class="col d-flex justify-content-end align-items-end">
                                    <button type="button" class="btn btn-outline-success"  data-toggle="modal" data-target="#exampleModalCenter">立即刊登</button>
                                    <!-- Modal -->
                                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                ...
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    <!-- Modal end -->
                                </div>
                                
                            </div>
                            
                        </div>    
                        
                        <div class="p-4 row">
                            <!-- <div class="col-4"><button type="button" class="btn btn-outline-success">立即刊登</button></div>         -->
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
</section>
