<?= $this->extend('layout/pet_layout') ?>

<?= $this->section('css') ?>
    <?= $this->include('base_view/css') ?>
    <link rel="stylesheet" href="<?php echo base_url('public')?>/assets/css/pet_view.css">
<?= $this->endSection() ?>
<?= $this->section('main') ?>
    <?= $this->include('base_view/nav') ?>
    <?= $this->include('pet_view/pet_main') ?>
    <?= $this->include('base_view/footer') ?>
    
<?= $this->endSection() ?>
<?= $this->section('js') ?>

    <?= $this->include('base_view/js') ?>
<?= $this->endSection() ?>
<?= $this->section('custom_js') ?>
    <!-- <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDL4tW2ZUt47XcDbcJdhMqc_56hLgkCA2I&callback=initMap"></script> -->
    <script>
        // $('document').ready(()=>{
        //     BaseLib.GetGoogle('https://maps.googleapis.com/maps/api/geocode/json?address=%E5%8F%B0%E7%81%A3%E5%8F%B0%E5%8C%97%E5%B8%82%E8%90%AC%E8%8F%AF%E5%8D%80%E5%BA%B7%E5%AE%9A%E8%B7%AF190%E8%99%9F&key=AIzaSyCIYa2mDtnA-YhijYbEp6mpicog7uWjQ1U')
        //     .then((res)=>{
        //         console.log(res.geometry);
        //     },(err)=>{

        //     })
        // })
        let map;
        function initMap() {
        map = new google.maps.Map(document.getElementById("map"), {
            center: { lat: -34.397, lng: 150.644 },
            zoom: 8,
        });
        }
        var CollectFun ={
            add:(id)=>{
                data = new FormData();
                data.append("pet_id",id);
                BaseLib.Post("/public/insertCollet",data).then(
                (res)=>{
                    
                    BaseLib.ResponseCheck(res).then(()=>{
                        window.location.reload();
                    })
                },
                (err)=>{
                    console.log(err);
                })
            },
            remove:(id)=>{
                data = new FormData();
                data.append("pet_id",id);
                BaseLib.Post("/public/deleteCollet",data).then(
                (res)=>{
                    
                    BaseLib.ResponseCheck(res).then(()=>{
                        window.location.reload();
                    })
                },
                (err)=>{
                    console.log(err);
                })
            }
        }
    </script>
<?= $this->endSection() ?>