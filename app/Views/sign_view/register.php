<?= $this->extend('layout/sign_layout') ?>

<?= $this->section('css') ?>
    <?= $this->include('base_view/css') ?>
<?= $this->endSection() ?>
<?= $this->section('main') ?>
    <?= $this->include('base_view/nav') ?>
    <?= $this->include('sign_view/register_main') ?>
    <?= $this->include('base_view/footer') ?>
    
<?= $this->endSection() ?>
<?= $this->section('js') ?>
    <?= $this->include('base_view/js') ?>
<?= $this->endSection() ?>
<?= $this->section('custom_js') ?>
   <script>
        // // Get the form.
        // var form = $('#register-form');
        // // Set up an event listener for the contact form.
        // $(form).submit(function(e) {
        //     // Stop the browser from submitting the form.
        //     e.preventDefault();
        //     // let data = form.getFormObject();
        //     // Serialize the form data.
        //     var formData = $(form).serialize();
        //     console.log(formData);
           
        // });
        $("form[id='register-form']").submit(function(e) {
            e.preventDefault();
            var formData = new FormData(document.getElementById('register-form'));
            // console.log(formData.get('user_gender'));
            if (checkRegister(formData)) return;
            BaseLib.Post("/public/register",formData).then(
                (res)=>{
                    BaseLib.ResponseCheck(res);
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
		// request_Base.ajaxPost("Login/userLogin", data).then(
		// 	(res) => {
		// 		// console.log(res);
		// 		// console.log(aes_Lib.CryptoJSAesDecrypt_WithData(res))
		// 		result = aes_Lib.CryptoJSAesDecrypt_WithData(res);
		// 		if (result.status == 1) {
		// 			Swal.fire({
		// 				icon: "success",
		// 				title: "提醒...",
		// 				text: "登入成功，即將為您跳轉",
		// 			}).then(() => {
		// 				setTimeout(() => {
		// 					window.location.href = lib_Config.base_Url + "/Home/home";
		// 				}, 0);
		// 			});
					
		// 		} else {
		// 			Swal.fire({
		// 				icon: "info",
		// 				title: "提醒...",
		// 				text: "登入失敗，請重新登入",
		// 			});
		// 		}
		// 	},
		// 	(err) => {
		// 		console.log(err);
		// 	}
		// );
   </script>
<?= $this->endSection() ?>