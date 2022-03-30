 <!-- JS here -->
 <script src="<?php echo base_url('public')?>/assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="<?php echo base_url('public')?>/assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="<?php echo base_url('public')?>/assets/js/popper.min.js"></script>
    <script src="<?php echo base_url('public')?>/assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('public')?>/assets/js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url('public')?>/assets/js/isotope.pkgd.min.js"></script>
    <script src="<?php echo base_url('public')?>/assets/js/ajax-form.js"></script>
    <script src="<?php echo base_url('public')?>/assets/js/waypoints.min.js"></script>
    <script src="<?php echo base_url('public')?>/assets/js/jquery.counterup.min.js"></script>
    <script src="<?php echo base_url('public')?>/assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="<?php echo base_url('public')?>/assets/js/scrollIt.js"></script>
    <script src="<?php echo base_url('public')?>/assets/js/jquery.scrollUp.min.js"></script>
    <script src="<?php echo base_url('public')?>/assets/js/wow.min.js"></script>
    <script src="<?php echo base_url('public')?>/assets/js/nice-select.min.js"></script>
    <script src="<?php echo base_url('public')?>/assets/js/jquery.slicknav.min.js"></script>
    <script src="<?php echo base_url('public')?>/assets/js/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo base_url('public')?>/assets/js/plugins.js"></script>
    <script src="<?php echo base_url('public')?>/assets/js/gijgo.min.js"></script>

    <!--contact js-->
    <script src="<?php echo base_url('public')?>/assets/js/contact.js"></script>
    <script src="<?php echo base_url('public')?>/assets/js/jquery.ajaxchimp.min.js"></script>
    <script src="<?php echo base_url('public')?>/assets/js/jquery.form.js"></script>
    <script src="<?php echo base_url('public')?>/assets/js/jquery.validate.min.js"></script>
    <script src="<?php echo base_url('public')?>/assets/js/mail-script.js"></script>
    <script src="<?php echo base_url('public')?>/assets/js/sweetalert2.js"></script>
    <script src="<?php echo base_url('public')?>/assets/js/main.js"></script>
    <script src="<?php echo base_url('public')?>/assets/js/baseLib.js"></script>
    <script>
        $('#datepicker').datepicker({
            iconsLibrary: 'fontawesome',
            disableDaysOfWeek: [0, 0],
        //     icons: {
        //      rightIcon: '<span class="fa fa-caret-down"></span>'
        //  }
        });
        $('#datepicker2').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
             rightIcon: '<span class="fa fa-caret-down"></span>'
         }

        });
        var timepicker = $('#timepicker').timepicker({
         format: 'HH.MM'
     });
     BaseLib.initLib('<?php echo base_url() ?>');
    </script>