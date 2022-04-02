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
        var UserFun = {
            drawUserInfo:(data)=>{
           
                if(data.user_gender == "male"){
                    data.user_gender = "男"
                }else if(data.user_gender == "female"){
                    data.user_gender = "女"
                }else{
                    data.user_gender = "不願透漏"
                }
                $('#user_email').text(data.user_email);
                $('#show_name').text(data.user_name);
                $('#profile_username').text(data.user_name);
                $('#name_input').val(data.user_name);
                $('#show_phone').text(data.user_phone);
                $('#phone_input').val(data.user_phone);
                $("#user_gender").text(data.user_gender);
                $("#preview").attr('src',`${BaseLib.base_Url}/public${data.user_photo}`);
                $("#profile_photo").attr('src',`${BaseLib.base_Url}/public${data.user_photo}`);
            },
            checkUpdateForm:(data)=>{
                if(data.get('name_input').length === 0){
                    Swal.fire(
                        '輸入錯誤!',
                        '使用者名稱不得為空!',
                        'info'
                        )
                    return true;
                }
                if(data.get('phone_input').length === 0){
                    Swal.fire(
                        '輸入錯誤!',
                        '手機號碼不得為空!',
                        'info'
                        )
                    return true;
                }
                if(!Number(data.get('phone_input'))){
                    Swal.fire(
                        '輸入錯誤!',
                        '手機號碼必須為數字!',
                        'info'
                        )
                    return true;
                }
                return false;
            }
        }
        $(document).ready(()=>{
            BaseLib.Get("/public/userInfo").then(
                (res)=>{
                    UserFun.drawUserInfo(res.data);
                },
                (err)=>{
                    console.log(err);
                })
        })
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
            if($('#name_input').val().replace(/(^s*)|(s*$)/g, "").length !==0){
                $('#show_name').text($('#name_input').val());
            }else{
                $('#name_input').val($('#show_name').text());
            }
          
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
            $("#phone_change").removeClass('d-none');
            if($('#phone_input').val().replace(/(^s*)|(s*$)/g, "").length !==0){
                $('#show_phone').text($('#phone_input').val());
            }else{
                $('#phone_input').val($('#show_phone').text());
            }
        })
          /**
         * 個人資訊修改
         */
        $("form[id='updateUserInfo-form']").submit(function(e) {
            e.preventDefault();
            var formData = new FormData(document.getElementById('updateUserInfo-form'));
            if (UserFun.checkUpdateForm((formData))) return;
            BaseLib.Post("/public/updateUserData",formData).then(
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
        /**
         * 修改密碼
         */
        $("form[id='change-password-form']").submit(function(e) {
            e.preventDefault();
            var formData = new FormData(document.getElementById('change-password-form'));
            if (checkRegister(formData)) return;
            BaseLib.Post("/public/rePassword",formData).then(
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
      
        /**
         * 刊登寵物
         */
        $("form[id='post-pet-form']").submit(function(e) {
            e.preventDefault();
            var formData = new FormData(document.getElementById('post-pet-form'));
            BaseLib.Post("/public/createPublish",formData).then(
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
        function checkRegister(formData) {
            if(formData.get('updatePassword')!== formData.get('updatePassword2')){
                Swal.fire(
                    '輸入錯誤!',
                    '二次輸入的密碼不符合!',
                    'info'
                )
                return true;
            }
            if(formData.get('updatePassword').length<=6){
                Swal.fire(
                    '提醒!',
                    '密碼必須大於6個英文字!',
                    'info'
                )
                return true;
            }
            return false;
        }
    </script>
<?= $this->endSection() ?>

