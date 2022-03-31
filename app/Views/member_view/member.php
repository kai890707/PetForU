<?= $this->extend('layout/member_layout') ?>

<?= $this->section('css') ?>
    <?= $this->include('base_view/css') ?>
    <link rel="stylesheet" href="<?php echo base_url('public')?>/assets/css/member_view.css">
<?= $this->endSection() ?>
<?= $this->section('main') ?>
    <?= $this->include('base_view/nav') ?>
    <?= $this->include('member_view/member_main') ?>
    <?= $this->include('base_view/footer') ?>
    
<?= $this->endSection() ?>
<?= $this->section('js') ?>
    <?= $this->include('base_view/js') ?>
<?= $this->endSection() ?>
<?= $this->section('custom_js') ?>
    <script>
        $(document).on("click", ".browse", function() {
            var file = $(this).parents().find(".file");
            file.trigger("click");
            });
            $('input[type="file"]').change(function(e) {
            var fileName = e.target.files[0].name;
            $("#file").val(fileName);

            var reader = new FileReader();
            reader.onload = function(e) {
                // get loaded data and render thumbnail.
                document.getElementById("preview").src = e.target.result;
            };
            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        });
        $(document).on("click", ".pet_browse", function() {
            var file = $(this).parents().find(".pet_file");
            file.trigger("click");
            });
            $('input[type="file"]').change(function(e) {
            var fileName = e.target.files[0].name;
            $("#petimgfile").val(fileName);

            var reader = new FileReader();
            reader.onload = function(e) {
                // get loaded data and render thumbnail.
                document.getElementById("pet_preview").src = e.target.result;
            };
            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        });
       
        $('#name_change').click(()=>{
            $('#name_input').removeClass('d-none');
            $('#name_save').removeClass('d-none');
            $('#show_name').addClass('d-none');
            $("#name_change").addClass('d-none');
            
        })
        $('#name_save').click(()=>{
            $('#name_input').addClass('d-none');
            $('#name_save').addClass('d-none');
            $('#show_name').removeClass('d-none');
            $("#name_change").removeClass('d-none');
        })
        $('#phone_change').click(()=>{
            $('#phone_input').removeClass('d-none');
            $('#phone_save').removeClass('d-none');
            $('#show_phone').addClass('d-none');
            $("#phone_change").addClass('d-none');
            
        })
        $('#phone_save').click(()=>{
            $('#phone_input').addClass('d-none');
            $('#phone_save').addClass('d-none');
            $('#show_phone').removeClass('d-none');
            $("#phonename_change").removeClass('d-none');
        })
        $("form[id='change-password-form']").submit(function(e) {
            e.preventDefault();
            var formData = new FormData(document.getElementById('change-password-form'));
            // console.log(formData.get('user_gender'));
            if (checkRegister(formData)) return;
            BaseLib.Post("/public/register",formData).then(
                (res)=>{
                    BaseLib.ResponseCheck(res).then(()=>{
                        if(res.status =="success"){
                            window.location=BaseLib.base_Url+"/public/login"
                        }
                    })
                    
                },
                (err)=>{
                    console.log(err);
                })
        })
        function checkRegister(formData) {
            if(formData.get('user_password')!== formData.get('user_repassword')){
                Swal.fire(
                    '輸入錯誤!',
                    '二次輸入的密碼不符合!',
                    'info'
                )
                return true;
            }
            if(formData.get('user_password').length<=6){
                Swal.fire(
                    '提醒!',
                    '密碼必須大於6個英文字!',
                    'info'
                )
                return true;
            }
            if(!Number(formData.get('user_phone'))){
                Swal.fire(
                    '提醒!',
                    '電話號碼必須為數字!',
                    'info'
                ) 
                return true;
            }
            return false;
        }
    </script>
<?= $this->endSection() ?>

