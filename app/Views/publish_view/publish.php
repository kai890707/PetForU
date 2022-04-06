<?= $this->extend('layout/publish_layout') ?>

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
<?= $this->endSection() ?>
<?= $this->section('main') ?>
    <?= $this->include('base_view/nav') ?>
    <?= $this->include('publish_view/publish_main') ?>
    <!-- <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="ti-arrow-up"></i></button> -->
    <!-- <button onclick="topFunction()" id="myBtn" title="Go to top" class="rounded-circle"><i class="ti-arrow-up"></i></button> -->
  
    <!-- Back to top button -->

    <?= $this->include('base_view/footer') ?>
    <button type="button" class="btn  btn-lg" id="btn-back-to-top"><i class="ti-arrow-up"></i></button>
<?= $this->endSection() ?>
<?= $this->section('js') ?>
    <?= $this->include('base_view/js') ?>
<?= $this->endSection() ?>
<?= $this->section('custom_js') ?>
    <!-- <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDL4tW2ZUt47XcDbcJdhMqc_56hLgkCA2I&callback=initMap"></script> -->
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