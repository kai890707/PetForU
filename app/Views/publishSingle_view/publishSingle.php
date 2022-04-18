<?= $this->extend('layout/pet_layout') ?>

<?= $this->section('css') ?>
    <?= $this->include('base_view/css') ?>
    <link rel="stylesheet" href="<?php echo base_url('public')?>/assets/css/pet_view.css">
<?= $this->endSection() ?>
<?= $this->section('main') ?>
    <?= $this->include('base_view/nav') ?>
    <?= $this->include('publishSingle_view/publishSingle_main') ?>
    <?= $this->include('base_view/footer') ?>
    
<?= $this->endSection() ?>
<?= $this->section('js') ?>

    <?= $this->include('base_view/js') ?>
<?= $this->endSection() ?>
<?= $this->section('custom_js') ?>
    <script>
        var isLogin = "<?php echo  session()->has('user_account')?>";
        
        var CollectFun ={
            vaildIsLogin:()=>{
                if(isLogin == "" | isLogin ==null | isLogin == undefined){
                    Swal.fire(
                        '提醒',
                        "目前您尚未登入，收藏功能將於登入後開啟! 請您登入後繼續。",
                        'info'
                    )
                    return false;
                }else{
                    return true;
                }
            },
            add:(id)=>{
                if(!CollectFun.vaildIsLogin()) return;
                data = new FormData();
                data.append("publish_id",id);
                BaseLib.Post("/public/insertPublishCollect",data).then(
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
                data.append("publish_id",id);
                BaseLib.Post("/public/deletePublishCollect",data).then(
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