<link rel="stylesheet" href="<?php echo base_url("assets/css/user.css"); ?>">
<div class="content">
    <div class="main-content">
        <div class="page_title">
            <h6><span class="font--green link_color_green">HOME</span> ><?php echo lang('login');?></h6>
        </div>
        <?php $this->load->view('template\flash_alert.php') ?>
        <div class="input_contain">
            <div class="input_area">
                <div class="box">
                    <?php if (isset($message)) echo $message?>
                    <form id="loginForm" action="" method="post" enctype="multipart/form-data">
                        <h1 class="text-center"><?php echo lang('login');?></h1>
                        <div class="form-group">
                            <label><?php echo lang('email_address');?></label>
                            <input type="text" name="email" value="" placeholder="例：example@email.com" class="form-control"> 
                        </div>      
                        <div class="form-group">
                            <label><?php echo lang('password');?></label>
                            <input type="password" name="password" value="" class="form-control">
                        </div>
                        <a href="<?php echo base_url('User/Login/forget_password');?>"><h6 class="font--grey text-right link_color_grey"><?php echo lang('forget_pwd')?></h6></a>
                        <button type="submit" class="button--second"><?php echo lang('login');?></button>
                    </form>
                </div>
            </div>
        </div>
        <h4 class="member_regist"><?php echo lang('regist_recommendation')?><a href="<?php echo base_url('User/Registration/');?>"><span class="font--green link_color_green"><?php echo lang('member_registraion')?></span></a></h4>
    </div>
</div>
<script>
    $(document).ready(function() {
        var base_url = "<?php echo base_url(); ?>";
        $("#loginForm").bind('submit', function(event) {
            event.preventDefault();
            $(".error-txt").remove();
            var flag = true;     
            var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
            var email = $("input[name='email']").val();
            var password = $("input[name='password']").val();
            if (email == "") {
                $("input[name='email']").after("<p class='error-txt'>" + "<?php echo lang('forget_pwd_val1');?>" + "</p>");
                flag = false;
            }
            if (!mailformat.test(email.toLowerCase()) && email !== "") {
                flag = false;
                $("input[name='email']").after("<p class='error-txt'>" + "<?php echo lang('forget_pwd_val2');?>" + "</p>");
            }
            if (password == "") {
                $("input[name='password']").after("<p class='error-txt'>" + "<?php echo lang('password_empty');?>" + "</p>");
                flag = false;
            }
            if (flag) {
                $.ajax({
                url: base_url + "User/Login/sign_in",
                type: "post",
                data: {email: email, password: password},
                success: function(response) {
                    if (response == "success") {
                        var pre_url = "<?php echo $this->session->userdata('pre_url');?>";
                        if(pre_url != "") {
                            <?php $this->session->unset_userdata('pre_url')?>
                            window.location.href = pre_url;
                        } else {
                            window.location.href=base_url;
                        }
                    } else if(response == "no_exist") {
                        $("input[name='email']").after("<p class='error-txt'>" + "<?php echo lang('email_no_exist');?>" + "</p>");  
                    } else if(response == "password_error") {
                        $("input[name='email']").after("<p class='error-txt'>" + "<?php echo lang('password_error');?>" + "</p>"); 
                    } else {
                        $("input[name='email']").after("<p class='error-txt'>" + "<?php echo lang('check_email_text1');?>" + "</p>"); 
                    }
                },
                error: function(xhr, status, err) {
                    $("input[name='email']").parent().before("<p class='error-txt'>" + "<?php echo lang('error');?>" + "</p>"); 
                } 
            })
            }
        })
    })
</script>