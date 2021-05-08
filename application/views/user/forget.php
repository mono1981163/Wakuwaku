<link rel="stylesheet" href="<?php echo base_url("assets/css/user.css"); ?>">
<div class="content">
    <div class="step_part">
        <div class="step_area">
            <div class="step_contents">
                <div>
                    <div class="step_circle_container first_step">
                        <div class="step_circle b--green"></div>
                    </div>
                    <h5><?php echo lang('email_input')?></h5>
                </div>
                <div>
                    <div class="step_circle_container">
                        <div class="step_circle"></div>
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
    <div class="main-content">
        <div class="input_contain">
            <h6 class="font--green link_color_green" onclick="window.history.back();"><?php echo lang('return')?></h6>
            <div class="input_area">
                <div class="box">
                    <form method="POST" onsubmit="event.preventDefault();emailValidate();" action="<?php echo base_url()?>User/Login/password_request" enctype="multipart/form-data">
                        <h1 class="text-center"><?php echo lang('password_reset')?></h1>
                        <h4><?php echo lang('password_reset_text')?></h4>
                        <div class="form-group">
                            <label for=""><h4><?php echo lang('email_address')?></h4></label>
                            <input id="email" type="text" name="mail_address" placeholder="例：example@email.com" class="form-control">
                            <div class="button-group">
                                <input type="submit" id="submitPasswordRequest" value="<?php echo lang('pass_forget_mail_trasfer')?>" class="button--second">                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var base_url = "<?php echo base_url()?>"; 
    function emailValidate() {
        $(".error-txt").remove();
        var flag = true;
        var email = document.getElementById('email').value;
        var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        if (email == "") {
            flag = false;
            $("#email").parent().before("<p class='error-txt'>"+ "<?php echo lang('forget_pwd_val1')?>" +"</p>");
        }
        if (!mailformat.test(email.toLowerCase()) && email !== "") {
            flag = false;
            $("#email").parent().before("<p class='error-txt'>"+ "<?php echo lang('forget_pwd_val2')?>" +"</p>");
        }
        if (flag) {
            $.ajax({
                url: base_url + "User/Login/password_request",
                type: 'post',
                data: {email: email},
                success: function (response) {
                    if (response == "no_exist") {
                        $(".error-txt").remove();
                        $("#email").parent().before("<p class='error-txt'>"+ "<?php echo lang('forget_pwd_val3')?>" +"</p>");
                    } else if (response == "success") {
                        $(".error-txt").remove();
                        window.location.href=base_url + "User/Login/email_check";
                    } else {
                        $(".error-txt").remove();
                        $("#email").parent().before("<p class='error-txt'>"+ "<?php echo lang('forget_pwd_val4')?>" +"</p>");
                    }
                },
                error: function(err) {
                    $(".error-txt").remove();
                    $("#email").parent().before("<p class='error-txt'>"+ "<?php echo lang('forget_pwd_val5')?>" +"</p>");
                }
            });
        }
    }
</script>