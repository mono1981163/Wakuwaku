<link rel="stylesheet" href="<?= base_url("assets/css/main.css");?>">
<link rel="stylesheet" href="<?= base_url("assets/css/inquery.css");?>">
<div class="content">
    <div class="main-content">
    <div class="container">
        <div class="data-input">
            <h2 class="mb-3"><?php echo lang('inquery_title')?></h2>
            <div class="form-box">
                <div class="item-title">
                    <div class="need"><?php echo lang('inquery_type')?></div>
                </div>
                <div class="item-input">
                    <div>
                        <select id="inquery_type" name="type"><option value="" selected="selected"><?php echo lang('to_select')?></option><option value="入会について"><?php echo lang('about_registration')?></option><option value="ログインについて"><?php echo lang('about_login')?></option><option value="賞品について"><?php echo lang('about_prize')?></option><option value="決済について"><?php echo lang('about_registration')?></option><option value="ログインについて"><?php echo lang('about_login')?></option><option value="賞品について"><?php echo lang('about_payment')?></option><option value="発送について"><?php echo lang('about_shipping')?></option><option value="利用規約について">利用規約について</option><option value="その他"><?php echo lang('about_other')?></select>
                    </div>
                </div>
            </div>
            <div class="form-box">
                <div class="item-title">
                    <div class="need"><?php echo lang('user_name')?></div>
                </div>
                <div class="item-input">
                    <div>
                        <span  class="inline-span">姓</span>
                        <input type="text" id="surname1" name="surname1" placeholder="">
                        <span  class="inline-span">名</span>
                        <input type="text" id="name1" name="name1" placeholder="">
                    </div>
                </div>
            </div>
            <div class="form-box">
                <div class="item-title">
                    <div class="need"><?php echo lang('email_address')?></div>
                </div>
                <div class="item-input">
                    <div>
                        <input type="email" id="email" name="mail_address" placeholder="">
                        <!-- <p>ドメイン指定受信をご利用の場合は、「@zenco.co.jp」からのメールが受信できるよう設定を行ってください。</p> -->
                    </div>
                </div>
            </div>
            <div class="form-box">
                <div class="item-title">
                    <div class="need"><?php echo lang('inquery_content')?></div>
                </div>
                <div class="item-input">
                    <div>
                        <textarea name="inquiry_question" rows="5" placeholder="<?php echo lang('inquery_content_text')?>" class="full "></textarea>
                    </div>
                </div>
            </div>
            <div class="form-box"></div>
            <div class="button-group">
                <button class="button" onclick="validation();"><?php echo lang('content_ensure')?></button>
            </div>
        </div>
        <div class="data-ensure">
            <div class="form-box">
                <div class="item-title">
                    <div class="need"><?php echo lang('inquery_type')?></div>
                </div>
                <div class="item-input">
                    <div id="ensure_type"></div>
                </div>
            </div>
            <div class="form-box">
                <div class="item-title">
                    <div class="need"><?php echo lang('user_name')?></div>
                </div>
                <div class="item-input">
                    <div id="ensure_name"></div>
                </div>
            </div>
            <div class="form-box">
                <div class="item-title">
                    <div class="need"><?php echo lang('email_address')?></div>
                </div>
                <div class="item-input">
                    <div id="ensure_email"></div>
                </div>
            </div>
            <div class="form-box">
                <div class="item-title">
                    <div class="need"><?php echo lang('inquery_content')?></div>
                </div>
                <div class="item-input">
                    <div id="ensure_inquery"></div>
                </div>
            </div>
            <div class="form-box"></div>
            <div class="button-group">
                <button class="button" onclick="returnTo();"><?php echo lang('return')?></button>
                <button class="button" onclick="sendInquery();"><?php echo lang('send')?></button>
            </div>
        </div>
    </div>
    </div>
</div>
<script>
    var base_url = "<?php echo base_url();?>"
    $(document).ready(function() {
        $(".data-input").show();
        $(".data-ensure").hide();
    })
    function validation() {
        var flag = true;
        var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        $(".error-txt").remove();
        $(".error").removeClass("error");
        var type = document.getElementById("inquery_type").value;
        var email = document.getElementById("email").value;
        if(type=="") {
            $("select[name=type]").addClass("error");
            $("select[name=type]").after("<p class='error-txt'><?php echo lang('inquery_err_text1')?></p>");
            flag = false;
        }
        if($("input[name=surname1]").val() == "") {
            $("input[name=surname1]").addClass("error");
            $("input[name=surname1]").after("<p class='error-txt'><?php echo lang('inquery_err_text2')?></p>");
            flag = false;
        }
        if($("input[name=surname1]").val() == "") {
            $("input[name=name1]").addClass("error");
            $("input[name=name1]").after("<p class='error-txt'><?php echo lang('inquery_err_text3')?></p>");
            flag = false;
        }
        if($("#email").val() == "") {
            $("#email").after("<p class='error-txt'> <?php echo lang('inquery_err_text4')?></p>");
            $("#email").addClass("error");
        }
        if (!mailformat.test(email.toLowerCase()) && email !== "") {
            flag = false;
            $("#email").after("<p class='error-txt'> <?php echo lang('inquery_err_text5')?></p>");
            $("#email").addClass("error");
        }
        if($("textarea[name=inquiry_question]").val() == "") {
            $("textarea[name=inquiry_question]").after("<p class='error-txt'> <?php echo lang('inquery_err_text6')?></p>");
            $("textarea[name=inquiry_question]").addClass("error");
            flag = false;
        }
        if (flag) {
            $(".data-input").hide();
            $(".data-ensure").show();
            $("#ensure_type").text(type);
            $("#ensure_name").text($("input[name=surname1]").val() + " " + $("input[name=name1]").val());
            $("#ensure_email").text(email);
            $("#ensure_inquery").text($("textarea[name=inquiry_question]").val());
        };
    }
    function returnTo() {
        $(".data-input").show();
        $(".data-ensure").hide();
    }
    function sendInquery() {
        var type = document.getElementById("inquery_type").value;
        var email = document.getElementById("email").value;
        $.ajax({
            url: base_url + "Inquery/receive",
            type: 'post',
            data: {type: type, email: email, name: $("#ensure_name").text(), inquery: $("#ensure_inquery").text()},
            success: function(response) {
                window.location.href = base_url + "Inquery/complete";
            }
        })
    }
</script>