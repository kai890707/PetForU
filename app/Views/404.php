<?= $this->extend('layout/404_layout') ?>

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
                            <h3>查無此頁</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- bradcam_area_end -->

        <section class="blog_area single-post-area section-padding">
        <div class="container">   
            
            <div class="row shadow bg-light p-4">
                <div class="col-12 h2 d-flex justify-content-center">很抱歉!</div>
                <div class="col-12 h4 d-flex justify-content-center">您所查詢的頁面不存在!</div>
                <div class="col-12 h4 d-flex justify-content-center"><button  class="btn btn-outline-info" onclick="go()">回首頁</button></div>
            </div>
        </div>
    </section>

    <?= $this->include('base_view/footer') ?>
    
<?= $this->endSection() ?>
<?= $this->section('js') ?>
    <?= $this->include('base_view/js') ?>
<?= $this->endSection() ?>
<?= $this->section('custom_js') ?>
    <script>
        function go() { window.location = BaseLib.base_Url+'/public/'  }
    </script>
<?= $this->endSection() ?>

