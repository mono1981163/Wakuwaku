<link rel="stylesheet" href="<?php echo base_url("assets/css/mypage.css"); ?>">
<div class="content">
    <div class="main-content">
        <div class="page_title">
            <h6><span class="font--green link_color_green">HOME</span> ><?php echo lang('order_history');?></h6>
        </div>
        <div class="basic-content">
            <div class="left_tab">
                <div class="tab_content">
                    <div class="tab_part active">
                        <h4><?php echo lang('order_history')?></h4>
                    </div>
                    <div class="tab_part">
                        <h4 onclick="window.location.href='<?php echo base_url('Mypage/Detail')?>'"><?php echo lang('account_info')?></h4>
                        <h6><?php echo lang('shipping_info')?></h6>
                        <h6><?php echo lang('email_address')?></h6>
                        <h6><?php echo lang('password')?></h6>
                        <h6><?php echo lang('payment_info')?></h6>
                    </div>
                    <div class="tab_part">
                        <h6><?php echo lang('log_out')?></h6>
                    </div>
                </div>
            </div>
            <div class="right_content order">
                <h1><?php echo lang('order_history')?></h1>
                <div class="info-container">
                        <?php foreach($list as $purchase) {?>
                            <div class="flex_parent">
                                <div class="gacha_img">
                                    <img src="<?php echo base_url('upload/gacha/').$purchase['image'];?>" class="gacha_image_pc" alt="">
                                    <img src="<?php echo base_url('upload/gacha/').$purchase['image_sp'];?>" class="gacha_image_sp" alt="">
                                </div>
                                <div class="detail">
                                    <h3><?php echo $purchase['name']?></h3>
                                    <h6><?php echo $purchase['purchase_date']?>&nbsp;<?php echo lang('purchase')?></h6>
                                    <?php if($purchase['delivery_state'] == "発送準備中") {?>
                                        <button class="button-green"><?php echo lang('undispatch')?></button>
                                    <?php } else {?>
                                        <button class="button-green"><?php echo lang('dispatch')?></button>
                                    <?php }?>
                                    <h5><?php echo lang('provide_rule')?>: <?php echo lang('after_end_of_sale_period')?><?php echo $purchase['estimated_delivery_time']?></h5>
                                    <h5><?php echo lang('number_of_purchase')?>：<?php echo $purchase['purchase_times']?>/<span class="font--red"><?php echo lang('remain')?>:<?php echo $purchase['remainder']?><?php echo lang('times')?></span>&nbsp;&nbsp;
                                        <?php if($purchase['remainder'] != 0) {?>
                                            <span class="font--green link_color_green" onclick="document.getElementById('playForm').submit();"><?php echo lang('turn_gacha')?></span>
                                            <form id="playForm" action="<?php echo base_url('Gacha/Gachaplay/play')?>" method="get" enctype="multipart/form-data">
                                                <input type="hidden" name="play" value="<?php echo $purchase['gacha_id']?>">
                                                <input type="hidden" name="is_play" value="no">
                                            </form>
                                        <?php }?>
                                    </h5>
                                    <h5><?php echo lang('purchase_amount')?>：<?php echo $purchase['amount']?></h5>
                                    <button class="button" onclick="window.location.href='<?php echo base_url('Mypage/Detail/prize_history/'.$purchase['gacha_id']);?>'"><?php echo lang('award_detail')?></button>
                                </div>
                            </div>
                        <?php }?>
                </div>
            </div>
        </div>
    </div>
</div>