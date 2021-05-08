<link rel="stylesheet" href="<?php echo base_url("assets/css/user.css"); ?>">
<div class="content">
    <div class="main-content">
        <div class="step_part">
            <div class="step_area">
                <div class="step_contents">
                    <div>
                        <div class="step_circle_container first_step step_line_active">
                            <div class="step_circle b--green"></div>
                        </div>
                        <h5><?php echo lang('email_input')?></h5>
                    </div>
                    <div>
                        <div class="step_circle_container first_step">
                            <div class="step_circle b--green"></div>
                        </div>
                        <h5><?php echo lang('email_verify')?></h5>
                    </div>
                    <div>
                        <div class="step_circle_container">
                            <div class="step_circle"></div>
                        </div>
                        <h5><?php echo lang('password_input')?></h5>
                    </div>
                    <div>
                        <div class="step_circle_container last_step">
                            <div class="step_circle"></div>
                        </div>
                        <h5><?php echo lang('reset_pwd_end')?></h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="input_contain">
            <h6 class="font--green link_color_green" onclick="window.location.href='<?php echo base_url('User/Login/forget_password')?>';"><?php echo lang('goto_email_input')?></h6>
            <div class="input_area">
                <div class="box px-4">
                    <h1 class="text-center"><?php echo lang('check_email_text1')?></h1>
                    <h4><?php echo lang('check_email_text2')?><br><?php echo lang('check_email_text3')?></h4>
                    <h6><?php echo lang('check_email_text4')?></h6>
                </div>
            </div>
        </div>
    </div>
</div>