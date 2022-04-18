

    <!-- bradcam_area_start -->
    <div class="bradcam_area breadcam_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bradcam_text text-center">
                        <h3>寵物資訊</h3>
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
                            <img class="img-fluid img-thumbnail" src="<?php echo $pet_info['pet_photo']=="無"?base_Url()."/public/assets/img/custom/main.png": base_Url()."/public/".$pet_info['published_photo'] ?>" alt="" width="400px" height="300px">
                        </div>
                        <div class="blog_details col-lg-6 col-md-6 col-12 p-4">
                        
                            
                            <h2 class="d-flex justify-content-between"> <span>動物資訊</span>  
                            <?php if($isCollect){?>
                            <button class="btn btn-outline-danger" onclick="CollectFun.remove(<?php echo$pet_info['published_id']?>)">刪除收藏</button>
                            <?php }else{?>
                            <button class="btn btn-outline-success" onclick="CollectFun.add(<?php echo$pet_info['published_id']?>)">加入收藏</button>
                            <?php }?>
                            </h2>
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
                                        <td><?php echo $pet_info['published_id'] ?></td>
                                        </tr>
                                        <tr>
                                        <th scope="row"><img class="img-fluid pet_card_icon mr-2" src="<?php echo base_url('public')?>/assets/img/custom/gender.png" alt="" width="30px" height="30px">品種</th>
                                        <td><?php echo $pet_info['published_variet'] ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <th scope="row"><img class="img-fluid pet_card_icon mr-2" src="<?php echo base_url('public')?>/assets/img/custom/gender.png" alt="" width="30px" height="30px">性別</th>
                                        <td><?php echo $pet_info['published_gender'] ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <th scope="row"><img class="img-fluid pet_card_icon mr-2" src="<?php echo base_url('public')?>/assets/img/custom/paw.png" alt="" width="30px" height="30px">體型</th>
                                        <td><?php echo $pet_info['published_bodytype'] ?></td>
                                    
                                        </tr>
                                        <tr>
                                        <tr>
                                        <th scope="row"><img class="img-fluid pet_card_icon mr-2" src="<?php echo base_url('public')?>/assets/img/custom/palette.png" alt="" width="30px" height="30px">毛色</th>
                                        <td><?php echo $pet_info['published_colour'] ?></td>
                                    
                                        </tr>
                                        <tr>
                                        <tr>
                                        <th scope="row"><img class="img-fluid pet_card_icon mr-2" src="<?php echo base_url('public')?>/assets/img/custom/age.png" alt="" width="30px" height="30px">年齡</th>
                                        <td><?php echo $pet_info['published_age'] ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <th scope="row"><img class="img-fluid pet_card_icon mr-2" src="<?php echo base_url('public')?>/assets/img/custom/first-aid-kit.png" alt="" width="30px" height="30px">接種狂犬疫苗</th>
                                        <td><?php echo $pet_info['published_bacterin'] ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <th scope="row"><img class="img-fluid pet_card_icon mr-2" src="<?php echo base_url('public')?>/assets/img/custom/first-aid-kit.png" alt="" width="30px" height="30px">結紮</th>
                                        <td><?php echo $pet_info['published_sterilization'] ?></td>
                                        
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
                                        <h3 class="font-weight-bold">寵物所在地</h3>
                                        <p><?php echo $pet_info['city_name'] ?></p>
                                    </div>
                                </div>
                                <div class="media contact-info col-lg-3 col-md-3 col-12">
                                    <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                                    <div class="media-body">
                                        <h3 class="font-weight-bold">飼主電話</h3>
                                        <p><?php echo $pet_info['user_phone'] ?></p>
                                    </div>
                                </div>
                                <div class="media contact-info  col-lg-3 col-md-3 col-12">
                                    <span class="contact-info__icon"><i class="ti-user"></i></span>
                                    <div class="media-body">
                                        <h3 class="font-weight-bold">飼主姓名</h3>
                                        <p><?php echo $pet_info['user_name'] ?></p>
                                    </div>
                                </div>
                                <div class="media contact-info  col-lg-3 col-md-3 col-12">
                    
                                    <span class="contact-info__icon"><i class="ti-email"></i></span>
                                    <div class="media-body">
                                        <h3 class="font-weight-bold">飼主Email</h3>
                                        <p><?php echo $pet_info['user_email'] ?></p>
                                    </div>
                                </div>
                            </div>
                            
                            
                        </div>
                    
                        <div class="blog_details col-12">
                            <h2 class="text-center">寵物其他資訊</h2>
                            <hr class="hr_line">
                            <div class="row mt-4 p-4">
                                <div class="col-12"><?php echo $pet_info['published_remark'] ?></div>
                            </div>
                            
                            
                        </div>
                       
                    </div>
            </div>
         </div>
      </div>
      
    </section>
