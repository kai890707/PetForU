<div class="row justify-content-center mt-5">
    <?php foreach($pets as $p){?>
        <div class="col-lg-4 col-md-6" id="petcard-<?php echo $p['pet_id']?>" onclick="FindPetFun.redirect(<?php echo $p['pet_id']?>);">
            <div class="single_service pet_card ">
                    <div class="service_thumb  d-flex align-items-center justify-content-center pet_card_size">
                        <div class="service_icon " >
                            <img class="img-fluid" src="<?php echo $p['published_photo'] ?>" alt="" height="300px" width="250px">
                        </div>
                    </div>
                    <div class="service_content text-center">
                    <h3>寵物資訊</h3>
                    <hr class="pet_card_h3_underline mb-4">
                        <div class="row">
                            <div class="col-3 offset-2"><img class="img-fluid pet_card_icon" src="assets/img/custom/gender.png" alt="" width="35px" height="35px"></div>
                            <div class="col-7 pet_card_fontsize"><span><?php echo $p['published_gender']?></span></div>
                        </div>
                        <div class="row">
                            <div class="col-3 offset-2"><img class="img-fluid pet_card_icon" src="assets/img/custom/paw.png" alt="" width="35px" height="35px"></div>
                            <div class="col-7 pet_card_fontsize"><span><?php echo $p['published_kind']?></span></div>
                        </div>
                        <div class="row">
                            <div class="col-3 offset-2"><img class="img-fluid pet_card_icon" src="assets/img/custom/location.png" alt=""width="35px" height="35px"></div>
                            <div class="col-7 pet_card_fontsize"><span><?php echo $p['city_name']?></span></div>
                        </div>
                    </div>
            </div>
        </div>
    <?php } ?>
</div>
