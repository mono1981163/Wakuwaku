<link rel="stylesheet" href="<?php echo base_url("assets/css/mypage.css"); ?>">
<div class="content">
    <div class="main-content">
        <div class="page_title">
            <h6><span class="font--green link_color_green">HOME</span> > <?php echo lang('account_info');?></h6>
        </div>
        <div class="basic-content">
            <div class="left_tab">
                <div class="tab_content">
                    <div class="tab_part">
                        <h4 onclick="window.location.href='<?php echo base_url('Mypage/Detail/order_history')?>'"><?php echo lang('order_history')?></h4>
                    </div>
                    <div class="tab_part active">
                        <h4><?php echo lang('account_info')?></h4>
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
            <div class="right_content account_info">
                <h1><?php echo lang('account_info')?></h1>
                <div class="info-container">
                    <!-- <h4 id="error_message"></h4> -->
                    <h3 class="text-left"><?php echo lang('shipping_info');?></h3>
                    <div class="info-box">
                        <div class="form-box">
                            <div class="item-title">
                                <div><?php echo lang('name');?></div>
                            </div>
                            <div class="item-input info_change">
                                <div><?php echo $surname1?>&nbsp;<?php echo $name1?>(<?php echo $surname2?><?php echo $surname2?>)</div>
                                <div ><h4 onclick="window.location.href='<?php echo base_url('Mypage/edit_profile');?>'" class="font--green link_color_green"><?php echo lang('change')?></h4></div>
                            </div>
                        </div>
                        <div class="form-box">
                            <div class="item-title">
                                <div><?php echo lang('shipping_address');?></div>
                            </div>
                            <div class="item-input info_change">
                                <div>
                                    <div>〒<?php echo $zip_code?></div>
                                    <div><?php echo $prefecture?>&nbsp;<?php echo $city?></div>
                                    <div><?php echo $roomno?></div>
                                </div>
                                <div><h4 onclick="window.location.href='<?php echo base_url('Mypage/edit_profile');?>'" class="font--green link_color_green"><?php echo lang('change')?></h4></div>
                            </div>
                        </div>
                        <div class="form-box">
                            <div class="item-title">
                                <div><?php echo lang('phone_number');?></div>
                            </div>
                            <div class="item-input info_change">
                                <div><?php echo $phone?></div>
                                <div><h4 onclick="window.location.href='<?php echo base_url('Mypage/edit_profile');?>'" class="font--green link_color_green"><?php echo lang('change')?></h4></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="info-container">
                    <h3 class="text-left"><?php echo lang('login_info');?></h3>
                    <div class="info-box">
                        <div class="form-box">
                            <div class="item-title">
                                <div><?php echo lang('email_address');?></div>
                            </div>
                            <div class="item-input info_change">
                                <div><?php echo $email?></div>
                                <div><h4 onclick="window.location.href='<?php echo base_url('Mypage/edit_profile');?>'" class="font--green link_color_green"><?php echo lang('change')?></h4></div>
                            </div>
                        </div>
                        <div class="form-box">
                            <div class="item-title">
                                <div><?php echo lang('password');?></div>
                            </div>
                            <div class="item-input info_change">
                                <div type="password">***********</div >
                                <div><h4 onclick="window.location.href='<?php echo base_url('Mypage/edit_profile');?>'" class="font--green link_color_green"><?php echo lang('change')?></h4></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
