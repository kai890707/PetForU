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
        function isHasImg(pathImg){
                var ImgObj=new Image();    
                ImgObj.src= pathImg;     
                if(ImgObj.fileSize > 0 || (ImgObj.width > 0 && ImgObj.height > 0)){       
                    return true;     
                } else {       
                    return false;    
                }}
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

    </script>
<?= $this->endSection() ?>

