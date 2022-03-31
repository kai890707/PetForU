
<?= $this->extend('layout/sign_layout') ?>

<?= $this->section('css') ?>
    <?= $this->include('base_view/css') ?>
<?= $this->endSection() ?>
<?= $this->section('main') ?>
    <?= $this->include('base_view/nav') ?>
    <?= $this->include('sign_view/login_main') ?>
    <?= $this->include('base_view/footer') ?>
    
<?= $this->endSection() ?>
<?= $this->section('js') ?>
    <?= $this->include('base_view/js') ?>
<?= $this->endSection() ?>
<?= $this->section('custom_js') ?>
   <script>
        $("form[id='login-form']").submit(function(e) {
            e.preventDefault();
            var formData = new FormData(document.getElementById('login-form'));
            // console.log(formData.get('user_gender'));
          
            BaseLib.Post("/public/login",formData).then(
                (res)=>{
                    BaseLib.ResponseCheck(res).then(()=>{
                        if(res.status =="success"){
                            window.location.reload();
                        }
                    })
                    
                },
                (err)=>{
                    console.log(err);
                })
        })
   </script>
<?= $this->endSection() ?>