<link rel="stylesheet" href="<?php echo base_url("assets/css/user.css"); ?>">
<div class="content">
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
                    <div class="step_circle_container first_step step_line_active">
                        <div class="step_circle b--green"></div>
                    </div>
                    <h5><?php echo lang('email_verify')?></h5>
                </div>
                <div>
                    <div class="step_circle_container">
                        <div class="step_circle b--green"></div>
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
            <div class="input_area">
                <div class="box">
                    <form method="POST" onsubmit="event.preventDefault();Validate();" action="<?php echo base_url()?>User/Login/password_reset" enctype="multipart/form-data">
                        <h1 class="text-center"><?php echo lang('new_pwd_input')?></h1>
                        <h4><?php echo lang('new_pwd_input_text1')?></h4>
                        <div class="form-group">
                            <label for=""><h4><?php echo lang('old_password')?></h4></label>
                            <input id="old_pwd" type="password" name="old_password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for=""><h4><?php echo lang('new_password')?></h4></label>
                            <input id="new_pwd" type="password" name="new_password" class="form-control">
                            <h5><?php echo lang('new_pwd_input_text2')?></h5>
                        </div>
                        <div class="form-group">
                            <label for=""><h4><?php echo lang('new_pwd_reinput')?></h4></label>
                            <input id="new_repwd" type="password" name="new_repassword" class="form-control">
                            <h5><?php echo lang('new_pwd_input_text3')?></h5>
                        </div>
                        <div class="button-group">
                            <input type="submit" id="submitPasswordRequest" value="<?php echo lang('reset_pwd_end')?>" class="button--second">                
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var base_url = "<?php echo base_url()?>"; 
    function Validate() {
        $(".error-txt").remove();
        var flag = true;
        var old_pwd = document.getElementById('old_pwd').value;
        var new_pwd = document.getElementById('new_pwd').value;
        var new_repwd = document.getElementById('new_repwd').value;
        if (old_pwd == "") {
            flag = false;
            $("#old_pwd").parent().before("<p class='error-txt'>"+ "<?php echo lang('old_pwd_empty')?>" +"</p>");
        }
        if (new_pwd == "") {
            flag = false;
            $("#new_pwd").parent().before("<p class='error-txt'>"+ "<?php echo lang('new_pwd_empty')?>" +"</p>");
        }
        if (new_pwd.length < 8) {
            flag = false;
            $("#new_pwd").parent().before("<p class='error-txt'>"+ "<?php echo lang('new_pwd_input_text2')?>" +"</p>");
        }
        if (new_repwd == "") {
            flag = false;
            $("#new_repwd").parent().before("<p class='error-txt'>"+ "<?php echo lang('new_repwd_empty')?>" +"</p>");
        }
        if (new_pwd != "" && new_repwd != "" && new_pwd != new_repwd) {
            flag = false;
            $("#new_pwd").parent().before("<p class='error-txt'>"+ "<?php echo lang('new_repwd_empty')?>" +"</p>");
        }
        if (flag) {
            $.ajax({
                url: base_url + "User/Login/password_reset",
                type: 'post',
                data: {old_password: old_pwd, new_password: new_pwd},
                success: function (response) {
                    if (response == "error_old") {
                        $(".error-txt").remove();
                        $("#old_pwd").parent().before("<p class='error-txt'>"+ "<?php echo lang('old_pwd_err')?>" +"</p>");
                    } else if (response == "success") {
                        $(".error-txt").remove();
                        window.location.href=base_url + "User/Login/reset_password_success";
                    } else {
                        $(".error-txt").remove();
                        $("#old_pwd").parent().before("<p class='error-txt'>"+ "<?php echo lang('error')?>" +"</p>");
                    }
                },
                error: function(err) {

                }
            });
        }
    }
</script>