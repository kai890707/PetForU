

    <!-- bradcam_area_start -->
    <div class="bradcam_area breadcam_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bradcam_text text-center">
                        <h3>浪浪資訊</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- bradcam_area_end -->

    <section class="blog_area single-post-area section-padding">
      <div class="container">
            <div class="row">
                <div class="col-lg-12 posts-list">
                    <div class="single-post row">
                        <div class="feature-img col-lg-6 col-md-6 col-12 justify-content-center align-items-center d-flex">
                            <img class="img-fluid img-thumbnail" src="<?php echo $pet_info['pet_photo'] ?>" alt="" width="400px" height="300px">
                        </div>
                        <div class="blog_details col-lg-6 col-md-6 col-12 p-4">
                            <h2 class="d-flex justify-content-between"> <span>動物資訊</span>  <button class="btn btn-outline-success">加入收藏</button></h2>
                            <p class="excert">
                                <table class="table table-borderless">
                                    <thead class="table-warning">
                                        <tr>
                                        <th scope="col">項目</th>
                                        <th scope="col">說明</th>
                                    
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <th scope="row"><img class="img-fluid pet_card_icon mr-2" src="<?php echo base_url('public')?>/assets/img/custom/price-label.png" alt="" width="30px" height="30px">編號</th>
                                        <td><?php echo $pet_info['pet_id'] ?></td>
                                        </tr>
                                        <tr>
                                        <th scope="row"><img class="img-fluid pet_card_icon mr-2" src="<?php echo base_url('public')?>/assets/img/custom/gender.png" alt="" width="30px" height="30px">品種</th>
                                        <td><?php echo $pet_info['pet_variety'] ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <th scope="row"><img class="img-fluid pet_card_icon mr-2" src="<?php echo base_url('public')?>/assets/img/custom/gender.png" alt="" width="30px" height="30px">性別</th>
                                        <td><?php echo $pet_info['pet_gender'] ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <th scope="row"><img class="img-fluid pet_card_icon mr-2" src="<?php echo base_url('public')?>/assets/img/custom/paw.png" alt="" width="30px" height="30px">體型</th>
                                        <td><?php echo $pet_info['pet_bodytype'] ?></td>
                                    
                                        </tr>
                                        <tr>
                                        <tr>
                                        <th scope="row"><img class="img-fluid pet_card_icon mr-2" src="<?php echo base_url('public')?>/assets/img/custom/palette.png" alt="" width="30px" height="30px">毛色</th>
                                        <td><?php echo $pet_info['pet_colour'] ?></td>
                                    
                                        </tr>
                                        <tr>
                                        <tr>
                                        <th scope="row"><img class="img-fluid pet_card_icon mr-2" src="<?php echo base_url('public')?>/assets/img/custom/age.png" alt="" width="30px" height="30px">年齡</th>
                                        <td><?php echo $pet_info['pet_age'] ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <th scope="row"><img class="img-fluid pet_card_icon mr-2" src="<?php echo base_url('public')?>/assets/img/custom/first-aid-kit.png" alt="" width="30px" height="30px">接種狂犬疫苗</th>
                                        <td><?php echo $pet_info['pet_bacterin'] ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <th scope="row"><img class="img-fluid pet_card_icon mr-2" src="<?php echo base_url('public')?>/assets/img/custom/first-aid-kit.png" alt="" width="30px" height="30px">結紮</th>
                                        <td><?php echo $pet_info['pet_sterilization'] ?></td>
                                        
                                        </tr>
                                    </tbody>
                                </table>
                            </p>
                            
                        </div>
                        
                        <div class="blog_details col-12">
                            <h2 class="text-center">帶牠回家</h2>
                            <hr class="hr_line">
                            <div class="row mt-4 p-4">
                            
                                
                                <div class="media contact-info col-lg-3 col-md-3 col-12">
                                    <span class="contact-info__icon"><i class="ti-home"></i></span>
                                    <div class="media-body">
                                        <h3 class="font-weight-bold">所屬收容所</h3>
                                        <p><?php echo $pet_info['pet_shelter_name'] ?></p>
                                    </div>
                                </div>
                                <div class="media contact-info col-lg-3 col-md-3 col-12">
                                    <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                                    <div class="media-body">
                                        <h3 class="font-weight-bold">收容所電話</h3>
                                        <p><?php echo $pet_info['pet_phone'] ?></p>
                                    </div>
                                </div>
                                <div class="media contact-info  col-lg-3 col-md-3 col-12">
                                    <span class="contact-info__icon"><i class="ti-location-pin"></i></span>
                                    <div class="media-body">
                                        <h3 class="font-weight-bold">收容所地址</h3>
                                        <p><?php echo $pet_info['pet_address'] ?></p>
                                    </div>
                                </div>
                                <div class="media contact-info  col-lg-3 col-md-3 col-12">
                    
                                    <span class="contact-info__icon"><i class="ti-search"></i></span>
                                    <div class="media-body">
                                        <h3 class="font-weight-bold">發現地</h3>
                                        <p><?php echo $pet_info['pet_foundplace'] ?></p>
                                    </div>
                                </div>
                            </div>
                            
                            
                        </div>
                    
                        <div class="blog_details col-12">
                            <h2 class="text-center">浪浪其他資訊</h2>
                            <hr class="hr_line">
                            <div class="row mt-4 p-4">
                                <div class="col-12"><?php echo $pet_info['pet_remark'] ?></div>
                            </div>
                            
                            
                        </div>
                        <div class=" mb-5 pb-4">
                            <div id="map"></div>
                        </div>
                    </div>
            </div>
         </div>
      </div>
      
    </section>
