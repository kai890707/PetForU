<!-- incluse session objects -->
<?php $session = \Config\Services::session(); ?>
<header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-3">
                            <div class="logo font-weight-bold ">
                                <a href="<?php echo base_url('/public')?>" class="logo-color">
                              
                                   PETFORU.com
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-9">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a  href="<?php echo base_url('public/')?>">首頁</a></li>
                                        <li><a href="<?php echo base_url('public')?>/find">找浪浪</a></li>
                                        <li><a href="<?php echo base_url('public')?>/publish">寵物媒合</a></li>
                                        
                                        <?php if(session()->has('user_account')){?>
                                            <li><a href="<?php echo base_url('public')?>/person">個人資訊</a></li>
                                        <?php }else{?>
                                            <li><a href="<?php echo base_url('public')?>/login">登入</a></li>
                                            
                                        <?php }?>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>