<?= $this->extend('layout/find_layout') ?>

<?= $this->section('css') ?>
    <?= $this->include('base_view/css') ?>
    <style>
        #btn-back-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            display: none;
            background-color: #ffc5c2;
        }
        #btn-back-to-top:hover{
            background-color: rgb(255, 197, 170);
        }
        #btn-back-to-top >i{
            color: white;
        }

    </style>
    <link rel="stylesheet" href="<?php echo base_url('public')?>/assets/css/find_view.css">
<?= $this->endSection() ?>
<?= $this->section('main') ?>
    <?= $this->include('base_view/nav') ?>
    <?= $this->include('find_view/find_main') ?>
    <?= $this->include('base_view/footer') ?>
    <button type="button" class="btn  btn-lg" id="btn-back-to-top"><i class="ti-arrow-up"></i></button>
<?= $this->endSection() ?>
<?= $this->section('js') ?>
    <?= $this->include('base_view/js') ?>
<?= $this->endSection() ?>
<?= $this->section('custom_js') ?>
   <script>
       let mybutton = document.getElementById("btn-back-to-top");
        window.onscroll = function () {
            scrollFunction();
        };

        function scrollFunction() {
        if (
            document.body.scrollTop > 20 ||
            document.documentElement.scrollTop > 20
        ) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
        }
        mybutton.addEventListener("click", backToTop);
        function backToTop() {
            // document.body.scrollTop = 0;
            // document.documentElement.scrollTop = 0;
            $('html,body').animate({ scrollTop: 0 }, 'slow');
        }
   </script>
<?= $this->endSection() ?>