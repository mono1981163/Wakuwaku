<link rel="stylesheet" href="<?= base_url("assets/css/top.css");?>">
<div class="content">
    <section style="margin-top:0;">
        <div class="swiper-container swiper1">
            <div class="swiper-wrapper">
                <?php foreach($topimage as $row) {?>
                <div class="swiper-slide">
                    <div class="card-image">
                        <img src="<?php echo base_url('upload/topimage/').$row['image'];?>" alt="Image Slider">
                    </div>
                </div>
                <?php }?>
            </div>
            <!-- <div class="swiper-pagination"></div> -->
            <div class="swiper-button-next">
                <img src="<?php echo base_url('assets/image/top/next.png')?>" alt="">
            </div>
            <div class="swiper-button-prev">
                <img src="<?php echo base_url('assets/image/top/prev.png')?>" alt="">
            </div>
        </div>
        <div class="swiper-container swiper_sp">
            <div class="swiper-wrapper">
                <?php foreach($topimage as $row) {?>
                <div class="swiper-slide">
                    <div class="card-image">
                        <img src="<?php echo base_url('upload/topimage/').$row['image_sp'];?>" alt="Image Slider">
                    </div>
                </div>
                <?php }?>
            </div>
            <!-- <div class="swiper-pagination"></div> -->
            <div class="swiper-button-next">
                <img src="<?php echo base_url('assets/image/top/next.png')?>" alt="">
            </div>
            <div class="swiper-button-prev">
                <img src="<?php echo base_url('assets/image/top/prev.png')?>" alt="">
            </div>
        </div>
    </section>
    <section class="maxwide">
        <h3 class="subtitle"><?php echo lang('gacha_for_sale');?></h3>
        <div class="sale-list pc">
            <?php foreach($latest as $row) {?>
                <div class="sale_card">
                    <a href="<?php echo base_url("Gacha/Purchase/gacha_detail/").$row['gacha_id'];?>"><img src="<?= base_url('upload/gacha/').$row['image'];?>" alt=""></a>
                    <h4><?php echo $row['name']?></h4>
                    <?php 

                    $start =strtotime($row['start_date']);
                    $end = strtotime($row['end_date']);
                    $current = strtotime(date('Y-m-d h:i:s'));

                    if($current < $start) {?>
                        <button class="button-green mr-2"><?php echo lang('before_sale')?></button><h5><?php echo substr($row['start_date'],0,-3)?>~<?php echo substr($row['end_date'],0,-3)?></h5>
                    <?php } else if($current > $start && $current < $end) {?>
                        <button class="button-green mr-2"><?php echo lang('on_sale')?></button><h5><?php echo substr($row['start_date'],0,-3)?>~<?php echo substr($row['end_date'],0,-3)?></h5>
                    <?php } else {?>
                        <button class="button-green mr-2"><?php echo lang('after_sale')?></button><h5><?php echo substr($row['start_date'],0,-3)?>~<?php echo substr($row['end_date'],0,-3)?></h5>
                    <?php }?>
                    <h4><span class="sale_price font--green"><?php echo $row['price']?></span><span class="font--green"><?php echo lang('money_unit')?></span>/<?php echo lang('times')?></h4>
                </div>
            <?php }?>
        </div>
        <div class="sp">
            <div class="swiper-container swiper2">
                <div class="swiper-wrapper">
                    <?php foreach($latest as $row) {?>
                    <div class="swiper-slide">
                        <div class="card-image">
                            <div class="sale_card">
                                <a href="<?php echo base_url("Gacha/Purchase/gacha_detail/").$row['gacha_id'];?>">
                                    <img src="<?= base_url('upload/gacha/').$row['image'];?>" class="gacha_image_pc" alt="">
                                    <img src="<?= base_url('upload/gacha/').$row['image_sp'];?>" class="gacha_image_sp" alt="">
                                </a>
                                <h4><?php echo $row['name']?></h4>
                                <?php 
                                
                                $start =strtotime($row['start_date']);
                                $end = strtotime($row['end_date']);
                                $current = strtotime(date('Y-m-d h:i:s'));

                                if($current < $start) {?>
                                    <button class="button-green mr-2"><?php echo lang('before_sale')?></button><h5><?php echo substr($row['start_date'],0,-3)?>~<?php echo substr($row['end_date'],0,-3)?></h5>
                                <?php } else if($current > $start && $current < $end) {?>
                                    <button class="button-green mr-2"><?php echo lang('on_sale')?></button><h5><?php echo substr($row['start_date'],0,-3)?>~<?php echo substr($row['end_date'],0,-3)?></h5>
                                <?php } else {?>
                                    <button class="button-green mr-2"><?php echo lang('after_sale')?></button><h5><?php echo substr($row['start_date'],0,-3)?>~<?php echo substr($row['end_date'],0,-3)?></h5>
                                <?php }?>
                                <h4><span class="sale_price font--green"><?php echo $row['price']?></span><span class="font--green"><?php echo lang('money_unit')?></span>/<?php echo lang('times')?></h4>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                </div>
                <div class="swiper-button-next">
                    <img src="<?php echo base_url('assets/image/top/next.png')?>" alt="">
                </div>
                <div class="swiper-button-prev">
                    <img src="<?php echo base_url('assets/image/top/prev.png')?>" alt="">
                </div>
            </div>
        </div>
        <div class="button-group">
            <button class="button" onclick="window.location.href='<?php echo base_url('Gacha/Gachalist');?>'"><h4 class="font--green"><?php echo lang('gacha_list_view');?></h4></button>
        </div>
    </section>
    <section>
        <img src="<?php echo base_url("assets/image/top/middle.png");?>" class="pc" alt="">
        <img src="<?php echo base_url("assets/image/top/middle_sp.png");?>" class="sp" alt="">

        <div class="intro">
            <h2><?php echo lang('intro_text1')?><br><?php echo lang('intro_text2')?></h2>
            <img src="<?php echo base_url("assets/image/logo.png");?>">
            <h6>powered by WACTOR</h6>
            <h4 class="mt-4"><?php echo lang('intro_text3')?></h4>
            <h4><?php echo lang('intro_text4_1')?><span class="font--green link_color_green">WACTOR</span><?php echo lang('intro_text4_2')?></h4>
            <h4><?php echo lang('intro_text5')?></h4>
        </div>
    </section>
    <section class="howtouse">
        <div class="maxwide">
            <h4 class="subtitle"><?php echo lang('how_to_use');?></h4>
            <div class="flow_contents">
                <div>
                    <img src="<?php echo base_url('assets/image/top/user-guide1.png')?>" alt="">
                    <h5 class="text-center"><?php echo lang('howtouse_title1');?></h5>
                    <div class="flow_circle_container first_step">
                        <div class="flow_circle"></div>
                    </div>
                    <h5><?php echo lang('howtouse_text1');?></h5>
                </div>
                <div>
                    <img src="<?php echo base_url('assets/image/top/user-guide2.png')?>" alt="">
                    <h5 class="text-center"><?php echo lang('howtouse_title2');?></h5>
                    <div class="flow_circle_container">
                        <div class="flow_circle"></div>
                    </div>
                    <h5><?php echo lang('howtouse_text2_1');?></h5>
                    <h6><?php echo lang('howtouse_text2_2');?></h6>
                </div>
                <div>
                    <img src="<?php echo base_url('assets/image/top/user-guide3.png')?>" alt="">
                    <h5 class="text-center"><?php echo lang('howtouse_title3');?></h5>
                    <div class="flow_circle_container">
                        <div class="flow_circle"></div>
                    </div>
                    <h5><?php echo lang('howtouse_text3');?></h5>
                </div>
                <div>
                    <img src="<?php echo base_url('assets/image/top/user-guide4.png')?>" alt="">
                    <h5 class="text-center"><?php echo lang('howtouse_title4');?></h5>
                    <div class="flow_circle_container last_step">
                        <div class="flow_circle"></div>
                    </div>
                    <h5><?php echo lang('howtouse_text4_1');?></h5>
                    <h6 class="pc"><?php echo lang('howtouse_text4_2');?></h6>
                    <h6 class="pc"><?php echo lang('howtouse_text4_3');?></h6>
                </div>
            </div>
            <div class="sp_change_addr">
                <h6 class="sp"><?php echo lang('howtouse_text4_2');?></h6>
                <h6 class="sp"><?php echo lang('howtouse_text4_3');?></h6>
            </div>
        </div>
    </section>
</div>
<script>
    // Swiper Configuration
    var swiper1 = new Swiper(".swiper1", {
        slidesPerView: 1,
        spaceBetween: 0,
        centeredSlides: true,
        // freeMode: true,
        grabCursor: true,
        loop: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true
        },
        autoplay: {
            delay: 4000,
            disableOnInteraction: false
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev"
        },
        breakpoints: {
            200: {
            slidesPerView: 1
            },
            700: {
            slidesPerView: 1.3
            }
        }
    });
    var swiper_sp = new Swiper(".swiper_sp", {
        slidesPerView: 1,
        spaceBetween: 0,
        centeredSlides: true,
        // freeMode: true,
        grabCursor: true,
        loop: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true
        },
        autoplay: {
            delay: 4000,
            disableOnInteraction: false
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev"
        },
        breakpoints: {
            200: {
            slidesPerView: 1
            },
            700: {
            slidesPerView: 1.3
            }
        }
    });
</script>
