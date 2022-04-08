<?= $this->extend('layout/mail_layout') ?>

<?= $this->section('css') ?>
    <?= $this->include('base_view/css') ?>

<?= $this->endSection() ?>
<?= $this->section('main') ?>
    <?= $this->include('base_view/nav') ?>
        <!-- bradcam_area_start -->
        <div class="bradcam_area breadcam_bg">
            <div class="container-fluid" style="padding-left: 100px;padding-right:100px;">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bradcam_text text-center">
                            <h3>找回密碼</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- bradcam_area_end -->

        <section class="blog_area single-post-area section-padding">
        <div class="container">   
            
    
    <form id="mail_form">
      <div class="form-group">
        <label>請輸入您的email</label>
        <input type="text" name="mailTo" class="form-control" required>
        <small>*以便我們發送新密碼給您</small>
      </div>
      <div class="form-group">
        <label>請輸入您的帳號</label>
        <input type="text" name="account" class="form-control" required>
        <small>*以便我們發送新密碼給您</small>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">送出</button>
      </div>
    </form>

        </div>
    </section>

    <?= $this->include('base_view/footer') ?>
    
<?= $this->endSection() ?>
<?= $this->section('js') ?>
    <?= $this->include('base_view/js') ?>
<?= $this->endSection() ?>
<?= $this->section('custom_js') ?>
    <script>
          /**
         * 發送mail
         */
        $("form[id='mail_form']").submit(function(e) {
            e.preventDefault();
            var formData = new FormData(document.getElementById('mail_form'));
            BaseLib.Post("/public/sendMail",formData).then(
                (res)=>{
                    BaseLib.ResponseCheck(res).then(()=>{
                        if(res.status =="success"){
                            window.location = BaseLib.base_Url+'/public/login';
                        }
                      
                    })
                    
                },
                (err)=>{
                    console.log(err);
                })
        })
    </script>
<?= $this->endSection() ?>


