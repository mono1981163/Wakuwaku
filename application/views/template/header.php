<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="format-detection" content="telephone=no">
    <meta name="keyword" content="">
    <meta name="description" content="">
    <meta property="og:title" content="">
    <meta property="og:type" content="article">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <meta property="og:description" content="">
    <meta property="og:site_name" content="限定グッズのカプセルプライズ　ガチャブポン">
    <title>ワクワクポン(WakuWakuPon)</title>
    <link rel="icon" href="<?php echo base_url("assets/image/logo_icon.png"); ?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/swiper-bundle.min.css"); ?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/header.css");?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/main.css");?>">
    <script src="<?php echo base_url("assets/js/jquery-3.3.1.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/js/swiper-bundle.min.js");?>"></script>
    <script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.min.js");?>"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-76285976-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'UA-76285976-1');
    </script> -->
</head>
<body id="body" class="">
    <header>
        <div class="logo">
            <a href="<?php echo base_url()?>">
                <img src="<?php echo base_url("assets/image/logo.png");?>">
            </a>
        </div>
        <div class="menu_group">
            <div class="pc menu_bar">
                <?php if ($this->session->userdata('email')) { ?>
                <div>
                    <a href="javascript:void(0)" onclick="event.stopPropagation();mypageDrop();">
                        <h5 id=""><?php echo lang('my_page');?></h5>
                    </a>
                </div>
                <div id="dropdown" class="mypageDropMenu">
                    <div onclick="window.location.href='<?php echo base_url('Mypage/Detail/order_history')?>'"><?php echo lang('order_history')?></div>
                    <div onclick="window.location.href='<?php echo base_url('Mypage/Detail')?>'"><?php echo lang('account_info')?></div>
                    <div onclick="window.location.href='<?php echo base_url('User/Login/sign_out')?>'"><?php echo lang('log_out')?></div>
                </div>
                <?php } else {?>
                <div class="login">
                    <a href="<?php echo base_url("User/Login");?>">
                        <h5><?php echo lang('login');?></h5>
                    </a>
                </div>
                <?php }?>
                <div>
                    <a href="<?php echo base_url("Gacha/Gachalist");?>">
                        <h5><?php echo lang('gacha_list');?></h5>
                    </a>
                </div>
                <div>
                    <a href="<?php echo base_url("Guide");?>">
                        <h5><?php echo lang('user_guide');?></h5>
                    </a>
                </div>
            </div>
            <div class="language_switch">
                <img src="<?php echo base_url('assets/image/language.svg')?>" class="world" alt="">
                <a href="<?php echo base_url("Welcome/switchLang");?>"><h6><?php echo lang('language')?></h6></a>
            </div>
            <div class="menu-trigger sp" id="trigger" onclick="event.stopPropagation();">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
            </div>
        </div>
    </header>
    <div id="myNav" class="menu_sp">    
        <a href="<?php echo base_url("Gacha/Gachalist");?>"><h5><?php echo lang('gacha_list');?></h5></a>
        <a href="<?php echo base_url("Guide");?>"><h5><?php echo lang('user_guide');?></h5></a>
        <?php if ($this->session->userdata('email')) {?> 
            <a href="<?php echo base_url("Mypage/Detail");?>"><h5><?php echo lang('account_info');?></h5></a>
            <a href="<?php echo base_url("Mypage/Detail/order_history");?>"><h5><?php echo lang('order_history');?></h5></a>
            <a href="<?php echo base_url("User/Login/sign_out");?>"><h5><?php echo lang('log_out');?></h5></a>
        <?php } else {?>
            <a href="<?php echo base_url("User/Login");?>"><h5><?php echo lang('login');?></h5></a>
        <?php }?>
    </div>
    <div id="menu-overlay"></div>
    <script>
        window.onclick = function(event) {
            var dropdown = document.getElementById("dropdown");
            if (dropdown != null) 
            {
                if (dropdown.classList.contains("active")) {
                    dropdown.classList.remove("active");
                }
            }
            var trigger = document.getElementById("trigger");
            var body = document.getElementById("body");
            if (trigger.classList.contains("change")) {
                trigger.classList.remove("change");
                body.classList.remove("menu_open");
            }
            var menu_sp = document.getElementById("myNav");
            if (menu_sp.classList.contains("is-show")) {
                menu_sp.classList.remove("is-show");
            }
        }
        function mypageDrop() {
            document.getElementById('dropdown').classList.toggle('active');
            var trigger = document.getElementById("trigger");
            var body = document.getElementById("body");
            if (trigger.classList.contains("change")) {
                trigger.classList.remove("change");
                body.classList.remove("menu_open");
            }
            var menu_sp = document.getElementById("myNav");
            if (menu_sp.classList.contains("is-show")) {
                menu_sp.classList.remove("is-show");
            }
        }
        $(function(){
            $("#trigger").on("click", function() {
                $("#trigger").toggleClass("change");
                $('.menu_sp').toggleClass("is-show");
                $("body").toggleClass("menu_open");
                var dropdown = document.getElementById("dropdown");
                if (dropdown != null) 
                {
                    if (dropdown.classList.contains("active")) {
                        dropdown.classList.remove("active");
                    }
                }
            });
        });
    </script>