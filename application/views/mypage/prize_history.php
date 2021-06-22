<link rel="stylesheet" href="<?php echo base_url("assets/css/mypage.css"); ?>">
<div class="content">
    <div class="main-content">
        <div class="page_title">
            <h6><span class="font--green link_color_green">HOME</span> > <span class="font--green link_color_green"><?php echo lang('order_history');?></span> > <?php echo $gachaData[0]['name']?></h6>
        </div>
        <div class="basic-content">
            <div class="left_tab">
                <div class="tab_content">
                    <div class="tab_part active">
                        <h4 onclick="window.location.href='<?php echo base_url('Mypage/Detail')?>'"><?php echo lang('order_history')?></h4>
                    </div>
                    <div class="tab_part">
                        <h4 onclick="window.location.href='<?php echo base_url('Mypage/Detail/order_history')?>'"><?php echo lang('account_info')?></h4>
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
            <div class="right_content">
                <h1><?php echo $gachaData[0]['name']?></h1>
                <h4><?php echo lang('win_prize')?></h4>
                <div class="purchase-detail">
                    <?php foreach($items as $purchase) {?>
                        <div class="prize_detail">
                            <img src="<?php echo base_url('upload/item/').$purchase['item_img'];?>" alt="">    
                            <div>
                                <?php if($this->session->userdata('site_lang') == 'japanese') {?>
                                    <h4 class="text-center"><?php echo $purchase['prize_name']?></h4>
                                <?php } else {?>
                                    <h4 class="text-center"><?php echo $purchase['prize_name_cn']?></h4>
                                <?php }?>
                                <?php for ($i = 0; $i<$purchase['gained_count']; $i++) {?>
                                    <img class="check_icon" src="<?php echo base_url('assets/image/checkbox.png')?>" alt="">
                                <?php }?>
                                <h4 class="text-center"><?php echo $purchase['gained_count']?><?php echo lang('acquisition')?></h4>
                            </div>
                        </div>
                    <?php }?>
                </div>
                <h4><?php echo lang('order_detail')?></h4>
                <div class="flex_parent">
                    <div class="gacha_img">
                        <img src="<?php echo base_url('upload/gacha/').$gachaData[0]['image'];?>" class="gacha_image_pc" alt="">    
                        <img src="<?php echo base_url('upload/gacha/').$gachaData[0]['image_sp'];?>" class="gacha_image_sp" alt=""> 
                    </div>
                    <div class="detail">
                        <h6><?php echo $purchaseData[0]['purchase_date']?>&nbsp;<?php echo lang('purchase')?></h6>
                        <?php if($purchaseData[0]['delivery_state'] == "発送準備中") {?>
                            <button class="button-green"><?php echo lang('undispatch')?></button>
                        <?php } else {?>
                            <button class="button-green"><?php echo lang('dispatch')?></button>
                        <?php }?>
                        <h5><?php echo lang('provide_rule')?>: <?php echo lang('after_end_of_sale_period')?><?php echo $gachaData[0]['estimated_delivery_time']?></h5>
                        <h5><?php echo lang('number_of_purchase')?>：<?php echo $purchaseData[0]['purchase_times']?>/<span class="font--red"><?php echo lang('remain')?>:<?php echo $purchaseData[0]['remainder']?><?php echo lang('times')?></span>&nbsp;&nbsp;
                        <?php if($purchaseData[0]['remainder'] != 0) {?>
                            <span class="font--green link_color_green" onclick="document.getElementById('playForm').submit();"><?php echo lang('turn_gacha')?></span>
                            <form id="playForm" action="<?php echo base_url('Gacha/Gachaplay/play')?>" method="get" enctype="multipart/form-data">
                                <input type="hidden" name="play" value="<?php echo $purchase['gacha_id']?>">
                                <input type="hidden" name="is_play" value="no">
                            </form>
                        <?php }?>
                        </h5>
                        <h5><?php echo lang('price')?>:<?php echo $gachaData[0]['price']?>/<?php echo lang('delivery_fee')?>:<?php echo $gachaData[0]['shipping_fee']?></h5>
                        <h5><?php echo lang('purchase_amount')?>：<?php echo $purchaseData[0]['amount']?></h5>
                        <h5><?php echo lang('order_number')?>：<?php echo $purchaseData[0]['order_number']?></h5>
                        <h5 class="font--green link_color_green" onclick="window.location.href='<?php echo base_url('Gacha/Purchase/gacha_detail/').$gachaData[0]['gacha_id']?>'"><?php echo lang('gacha_sale_view')?></h5>
                    </div>
                </div>
                <button type="button" onclick="window.location.href='<?php echo base_url('Mypage/Detail/order_history')?>'" class="button"><h4 class="font--green"><?php echo lang('return_order_history')?></h4></button>
            </div>
        </div>
    </div>
</div>