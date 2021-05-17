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
    <meta property="og:site_name" content="限定グッズのカプセルプライズ　ウェブポン">
    <title></title>
    <link rel="stylesheet" href="<?= base_url("assets/css/bootstrap.min.css"); ?>">
    <link rel="stylesheet" href="<?= base_url("assets/css/manage/header.css");?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/manage/common.css');?>">
    <script src="<?= base_url("assets/js/jquery-3.3.1.min.js"); ?>"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
<body>
    <header>
        <h1 class="logo">
            <a href="<?php echo base_url("Dashboard")?>">
                <img src="<?php echo base_url("assets/image/logo.png");?>">
            </a>
        </h1>
        <div class="d-flex r-btngroup">
            <a href="<?php echo base_url('Top_manage');?>"><button type="button" class="btn_menu">トップ編集</button></a>
            <a href="<?php echo base_url('Gacha/gacha_manage');?>"><button class="btn_menu">ガチャ管理</button></a>
            <a href="<?php echo base_url('Delivery');?>"><button type="button" class="btn_menu">配送管理</button></a>
            <?php if(isset($emailSetting)) {?>
                <a href="<?php echo base_url('MailSetting');?>"><button type="button" class="btn_menu">メール設定</button></a>
            <?php }?>
        </div>
        
    </header>