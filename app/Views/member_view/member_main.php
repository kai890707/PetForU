

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
                    <a class="nav-link" id="v-pills-personpet-tab"style="background-color:rgba(0,0,0,0) !important;"  data-toggle="pill" href="#v-pills-personpet" role="tab" aria-controls="v-pills-personpet" aria-selected="false"><i class="fa fa-paw mr-2"></i>寵物收藏</a>
                    <a class="nav-link" id="v-pills-settings-tab" style="background-color:rgba(0,0,0,0) !important;" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false"><i class="fa fa-folder mr-2"></i>個人刊登</a>
                </div>
            </div>
            <div class="col-9 shdow-lg rounded bg-white">
                <div class="tab-content " id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <?= $this->include('member_view/component/person_info') ?>
                    </div>
                    <div class="tab-pane fade" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <?= $this->include('member_view/component/change_password') ?>
                    </div>
                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                        <?= $this->include('member_view/component/collect_stray') ?>
                    </div>
                    <div class="tab-pane fade" id="v-pills-personpet" role="tabpanel" aria-labelledby="v-pills-personpet-tab">
                        <?= $this->include('member_view/component/collect_owned') ?>
                    </div>
                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                        <?= $this->include('member_view/component/post') ?>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
</section>
