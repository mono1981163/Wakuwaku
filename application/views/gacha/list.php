<link rel="stylesheet" href="<?php echo base_url("assets/css/gacha.css"); ?>">
<div class="content">
    <div class="main-content">
        <div class="page_title">
            <h6><span class="font--green link_color_green">HOME</span> ><?php echo lang('gacha_list');?></h6>
        </div>
        <h1 class="text-center"><?php echo lang('gacha_list');?></h1>
        <div class="sale-list">
            <?php foreach($list as $gacha) {?>
                <div class="sale_card">
                    <a href="<?php echo base_url("Gacha/Purchase/gacha_detail/").$gacha['gacha_id'];?>">
                        <img src="<?= base_url('upload/gacha/').$gacha['image'];?>" class="gacha_image_pc" alt="">
                        <img src="<?= base_url('upload/gacha/').$gacha['image_sp'];?>" class="gacha_image_sp" alt="">
                    </a>
                    <h4><?php echo $gacha['name']?></h4>
                    <?php if($gacha['status'] == "近日発売") {?>
                        <button class="button-green mr-2"><?php echo lang('before_sale')?></button><h5><?php echo $gacha['start_date']?>~<?php echo $gacha['end_date']?></h5>
                    <?php } else if($gacha['status'] == "発売中") {?>
                        <button class="button-green mr-2"><?php echo lang('on_sale')?></button><h5><?php echo $gacha['start_date']?>~<?php echo $gacha['end_date']?></h5>
                    <?php } else {?>
                        <button class="button-green mr-2"><?php echo lang('after_sale')?></button><h5><?php echo $gacha['start_date']?>~<?php echo $gacha['end_date']?></h5>
                    <?php }?>
                    <h4><span class="sale_price font--green"><?php echo $gacha['price']?></span><span class="font--green"><?php echo lang('money_unit')?></span>/<?php echo lang('times')?></h4>
                </div>
            <?php }?>
        </div>
    </div>
</div>