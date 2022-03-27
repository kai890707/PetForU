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
    $('form').submit(function(e) {
    e.preventDefault();
    login.submit();
})
var login = {
    $formDom: $('#register_form'),

    submit: function() {
        var data = this.$formDom.getFormObject();
        console.log(data);
        // if (this.checkForm(data)) return;
        // console.log(this.checkForm(data));
        // baseFunction.ajaxPost("login/login", data).then(
        //     (res) => {
        //         console.log(res);
        //         if (res.status == 1) {
        //             Swal.fire("success", "Sign in successfully", "success").then((result) => {
        //                 if (result) {
        //                     window.location.reload();
        //                 } else {
        //                     window.location.reload();
        //                 }
        //             });
        //             setTimeout(() => {
        //                 window.location.reload();
        //             }, 2000);
        //         } else {
        //             Swal.fire("error", "email or password incorrect", "error");
        //             return true;
        //         }
        //     }, (err) => {
        //         console.log(err);
        //     }
        // )
    },
    checkForm: function(formData) {
        if (formData.email == " ") {
            Swal.fire("info", "Email cannot be empty", "info");
            return true;
        } else if (formData.password == " ") {
            Swal.fire("info", "Password cannot be empty", "info");
            return true;
        } else {
            return false;
        }
    }
}
   </script>
<?= $this->endSection() ?>