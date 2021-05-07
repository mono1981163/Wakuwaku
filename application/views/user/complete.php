<link rel="stylesheet" href="<?php echo base_url("assets/css/user.css"); ?>">

<div class="content">
    <div class="step_part">
        <div class="step_area">
            <div class="step_contents">
                <div>
                    <div class="step_circle_container first_step step_line_active">
                        <div class="step_circle b--green"></div>
                    </div>
                    <h5><?php echo lang('member_info_input')?></h5>
                </div>
                <div>
                    <div class="step_circle_container first_step step_line_active">
                        <div class="step_circle b--green"></div>
                    </div>
                    <h5><?php echo lang('member_info_confirm')?></h5>
                </div>
                <div>
                    <div class="step_circle_container last_step step_line_active">
                        <div class="step_circle b--green"></div>
                    </div>
                    <h5><?php echo lang('member_regist_completed')?></h5>
                </div>
            </div>
        </div>
    </div>
    <div class="main-content">
        <div class="page_title">
            <h6><span class="font--green">HOME</span> ><?php echo lang('member_regist_completed');?></h6>
        </div>
        <div class="step-under">
            <div class="input_contain">
                <div class="box">
                    <h1 class="text-center"><?php echo lang('member_regist_completed');?></h1>
                    <img class="check_img" src="<?php echo base_url('assets/image/user/arrow.png')?>" alt="">
                    <h3 style="color: red"><?php echo lang('email_verify_text1');?></h3>
                    <h3><?php echo lang('email_verify_text2');?></h3>
                </div>
            </div>
            <div class="button-group">
                <button class="button" id="" onclick="window.location.href='<?php echo base_url('Gacha/Gachalist');?>'"><?php echo lang('goto_gacha_list');?></button>
            </div>
        </div>
    </div>
</div>