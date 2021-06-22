<link rel="stylesheet" href="<?php echo base_url("assets/css/mypage.css"); ?>">
<div class="content">
    <div class="main-content">
        <div class="page_title">
            <h6><span class="font--green link_color_green">HOME</span> > <span class="font--green link_color_green"><?php echo lang('account_info');?></span> > <?php echo lang('change_member_info')?></h6>
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
            <div class="right_content">
                <div class="data-input">
                    <h1 class="text-center"><?php echo lang('change_member_info')?></h1>
                    <h4 id="error_message"></h4>
                    <div class="info-container">
                        <h3 class="text-left"><?php echo lang('shipping_info');?></h3>
                        <div class="info-box">
                            <div class="form-box">
                                <div class="item-title">
                                    <div class="need"><?php echo lang('name')?></div>
                                </div>
                                <div class="item-input name_box">
                                    <div class="item-box">
                                        <div>
                                            <p>姓</p>
                                            <input type="text" id="surname1" name="surname1" value="<?php echo $surname1?>">
                                        </div>
                                        <div>
                                            <p>名</p>
                                            <input type="text" id="name1" name="name1" value="<?php echo $name1?>">
                                        </div>
                                    </div>
                                    <div class="item-box japan_name">
                                        <div>
                                            <p>セイ</p>
                                            <input type="text" id="surname2" name="surname2" value="<?php echo $surname2?>">
                                        </div>
                                        <div>
                                            <p>メイ</p>
                                            <input type="text" id="name2" name="name2" value="<?php echo $name2?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-box">
                                <div class="item-title">
                                    <div class="need"><?php echo lang('shipping_address')?></div>
                                </div>
                                <div class="item-input">
                                    <div class="check-country radio_contain">
                                        <input type="radio" class="radio" id="cb1" name="japan" value="日本">
                                        <label for="cb1">日本</label>
                                        <input type="radio" class="radio" id="cb2" name="china" value="中国">
                                        <label for="cb2">中国</label>
                                        <h6 class="country_support"><?php echo lang('country_support')?></h6>
                                    </div>
                                    <div class="zip-code">
                                        <p><?php echo lang('zip_code');?></p>
                                        <div>
                                            <div class="zip_input"><input type="text" id="zip_code" name="zip_code" maxlength="7" value="<?php echo $zip_code?>"></div>
                                            <button class="button"><h5 class="font--green"><?php echo lang('addr_auto_input');?></h5></button>
                                        </div>
                                        <h5><?php echo lang('zip_search_text1')?><a href="https://www.post.japanpost.jp/zipcode/index.html" target="_blank"><span class="font--green link_color_green"><?php echo lang('search')?></span></a><?php echo lang('zip_search_text2')?></h5>
                                    </div>
                                    <div class="prefecture">
                                        <p><?php echo lang('prefecture');?></p>
                                        <input type="text" id="addr3" name="prefecture" value="<?php echo $prefecture?>">
                                    </div>
                                    <div class="city">
                                        <p><?php echo lang('city');?></p>
                                        <input type="text" id="addr4" name="city" value="<?php echo $city?>">
                                    </div>
                                    <div class="apart">
                                        <p><?php echo lang('building');?></p>
                                        <input type="text" id="addr6" name="apart" value="<?php echo $roomno?>">
                                        <h5><?php echo lang('building_text');?></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="form-box">
                                <div class="item-title">
                                    <div class="need"><?php echo lang('phone_number');?></div>
                                </div>
                                <div class="item-input">
                                    <div class="phone-number">
                                        <input id="phonenumber" name="phonenumber" type="text" maxlength="13" class="" value="<?php echo $phone?>">
                                        <h5><?php echo lang('phone_text');?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="info-container">
                        <h3><?php echo lang('login_info')?></h3>
                        <div class="info-box">
                            <div class="form-box">
                                <div class="item-title">
                                    <div class="need"><?php echo lang('email_address');?></div>
                                </div>
                                <div class="item-input">
                                    <div>
                                        <p><?php echo lang('email_address')?></p>
                                        <input id="email" name="mail_address" type="text" value="<?php echo $email?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-box">
                                <div class="item-title">
                                    <div class="need"><?php echo lang('password');?></div>
                                </div>
                                <div class="item-input">
                                    <div>
                                        <p><?php echo lang('password')?></p>
                                        <input id="password" name="password" type="password" value="12345678">
                                        <h5><?php echo lang('password_note1');?></h5>
                                    </div>
                                    <div>
                                        <p><?php echo lang('pwd_reinput')?></p>
                                        <input id="repwd" name="password_confirmation" type="password" value="12345678">
                                        <h5><?php echo lang('password_note2');?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="button-group">
                        <button type="button" onclick="returnTo();" class="button"><?php echo lang('goto_regist_info')?></button>
                        <button id="input-end" type="button" class="button--second"><?php echo lang('member_regist_end')?></button>       
                    </div>
                </div>
                <!-- <div class="data-ensure">
                    <h1 class="text-center"><?php echo lang('regist_info_confirm')?></h1>
                    <div class="info-container">
                        <h4 id="error_message"></h4>
                        <h3 class="text-left"><?php echo lang('shipping_info');?></h3>
                        <div class="info-box">
                            <div class="form-box">
                                <div class="item-title">
                                    <div><?php echo lang('name');?></div>
                                </div>
                                <div class="item-input">
                                    <div id="ensureName"></div>
                                </div>
                            </div>
                            <div class="form-box">
                                <div class="item-title">
                                    <div><?php echo lang('shipping_address');?></div>
                                </div>
                                <div class="item-input">
                                    <div id="ensureAddress"></div>
                                </div>
                            </div>
                            <div class="form-box">
                                <div class="item-title">
                                    <div><?php echo lang('phone_number');?></div>
                                </div>
                                <div class="item-input">
                                    <div id="ensurePhone"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="info-container">
                        <h3 class="text-left"><?php echo lang('shipping_info');?></h3>
                        <div class="info-box">
                            <div class="form-box">
                                <div class="item-title">
                                    <div><?php echo lang('email_address');?></div>
                                </div>
                                <div class="item-input">
                                    <div id="ensureEmail"></div>
                                </div>
                            </div>
                            <div class="form-box">
                                <div class="item-title">
                                    <div><?php echo lang('password');?></div>
                                </div>
                                <div class="item-input">
                                    <div id="ensurePwd" type="password"></div >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="button-group">
                        <button type="button" onclick="returnTo();" class="button"><?php echo lang('regist_info_input')?></button>
                        <button id="registration" type="button" onclick="userChange();" class="button--second"><?php echo lang('member_regist_end')?></button>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('template/language.php');?>
<script>
    var base_url = "<?php echo base_url(); ?>";
    (function($) {
        if("<?php echo $country?>" == "日本") {
            var japanese=true;
            $('.check-country input[name=japan]').prop('checked', true);
        } else {
            var japanese=false;
            $('.check-country input[name=china]').prop('checked', true);
        }
        $('.check-country .radio').click(function() {
            $('.check-country .radio').not(this).prop('checked', false);
        });
        $('.check-country input[name=china]').click(function() {
            $('.japan_name').css('display','none');
            japanese = false;
        })
        $('.check-country input[name=japan]').click(function() {
            $('.japan_name').css('display','flex');
            japanese = true;
        })
        var surname1, name1, surname2, name2, country, zip_code, addr3, addr4, addr6, email, phonenumber, password, ensurePwd ;
        $("#input-end").bind('click', function() {
            $(".error-txt").remove();
            var flag = true;
            surname1 = $("#surname1").val();
            name1 = $("#name1").val();
            surname2 = $("#surname2").val();
            name2 = $("#name2").val();
            zip_code = $("#zip_code").val();
            addr3 = $("#addr3").val();
            addr4 = $("#addr4").val();
            addr6 = $("#addr6").val();
            phonenumber = $("#phonenumber").val();
            email = $("#email").val();
            password = $("#password").val();
            repassword = $("#repwd").val();
            country = $(".check-country input[type='radio']:checked").val();
            $("#ensureName").text(surname1 + " " + name1 + "(" + surname2 + " " + name2 + ")");
            $("#ensurePhone").text(phonenumber);
            $("#ensureAddress").append("<p>〒"+zip_code+"</p><p>"+addr3+" "+addr4+"</p><p>"+addr6+"</p>")
            $("#ensureEmail").text(email);

            var hiddenPass = password;
            var passlen = hiddenPass.length;
            var hiddenLen = Math.floor(passlen*0.65);
            for(var i=0; i<hiddenLen; i++) {
                var random = Math.floor(Math.random() * passlen);
                if(hiddenPass.substring(random, random+1) == "*") {
                    hiddenLen++;
                } else {
                    hiddenPass = hiddenPass.replace(hiddenPass.substring(random, random+1),"*");
                }
            }

            $("#ensurePwd").text(hiddenPass);
            var address = zip_code + "-" +  addr3 +"-" +  addr4 + "-" +"-" +  addr6;
            var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
            var phoneno = /^\(?([0-9]{3})\)?[-. ]?([0-9]{4})[-. ]?([0-9]{4})$/;
            var numbers = /^[0-9]+$/;
            if (japanese) {
                $("#ensureName").text(surname1 + " " + name1 + "(" + surname2 + " " + name2 + ")");
                if (surname1 == "" || name1 == "" || surname2 == "" || name2 == "" ) {
                    flag = false;
                    $("#surname1").parent().parent().before("<p class='error-txt'>名前は必須です。</p>");
                    $("#surname1").addClass("error");
                    $("#name1").addClass("error");
                }
            } else {
                $("#ensureName").text(surname1 + " " + name1);
                if (surname1 == "" || name1 == "" ) {
                    flag = false;
                    $("#surname1").parent().parent().before("<p class='error-txt'>名前は必須です。</p>");
                    $("#surname1").addClass("error");
                    $("#name1").addClass("error");
                }
            }
            if (zip_code=="" || addr3=="" || addr4=="" ) {
                flag = false;
                $(".zip-code").append("<div class='error-txt'>" + err_addr[language] + "</div>")
            }
            if (phonenumber == "") {
                flag = false;
                $("#phonenumber").parent().before("<p class='error-txt'>" + err_phone_empty[language] + "</p>");
                $("#phonenumber").addClass("error");
            }
            if ((phonenumber !== "" && !phonenumber.match(phoneno))) {
                flag = false;
                $("#phonenumber").parent().before("<p class='error-txt'>" + err_addr_wrong[language] + "</p>");
                $("#phonenumber").addClass("error");
            }
            if (email == "") {
                flag = false;
                $("#email").parent().before("<p class='error-txt'>" + err_email_empty[language] + "</p>");
                $("#email").addClass("error");
            }
            if (password == "") {
                flag = false;
                $("#password").parent().before("<p class='error-txt'>" + err_pass_empty[language] + "</p>");
                $("#password").addClass("error");
            }
            if (password !== "" && password.length < 8) {
                flag = false;
                $("#password").parent().before("<p class='error-txt'>" + err_pass_wrong[language] + "</p>");
                $("#repwd").addClass("error");
            }
            if (password !== "" && password != repassword) {
                flag = false;
                $("#password").parent().before("<p class='error-txt'>" + "<?php echo lang('password_note2')?>" + "</p>");
                $("#repwd").addClass("error");
            }
            if (!mailformat.test(email.toLowerCase()) && email !== "") {
                flag = false;
                $("#email").parent().before("<div class='error-txt'>" + err_email_wrong[language] + "</div>");
                $("#email").addClass("error");
            }
            if (flag) {
                var data = {};
                data['surname1'] = $("#surname1").val();
                data['name1'] = $("#name1").val();
                data['surname2'] = $("#surname2").val();
                data['name2'] = $("#name2").val();
                if(!japanese) {
                    data['surname2'] = "";
                    data['name2'] = "";
                }
                data['country'] = $(".check-country input[type='radio']:checked").val();;
                data['zip_code'] = $("#zip_code").val();
                data['prefecture'] = $("#addr3").val();
                data['city'] = $("#addr4").val();
                data['roomno'] = $("#addr6").val();
                data['phone'] = $("#phonenumber").val();
                data['email'] = $("#email").val();
                data['password'] = $("#password").val();
                $.ajax({
                    type: 'post',
                    url: base_url + "Mypage/Edit_profile/update_profile",
                    data: data,
                    success: function (response) {
                        if (response == "success") {
                            window.location.href = base_url + "Mypage/Detail"
                        }  else if (response == "error") {
                            document.getElementById('error_message').innerHTML = m_error[language];
                        } 
                    },
                    error: function(xhr,status,error) {
                        document.getElementById('error_message').innerHTML = m_error[language];
                        // launchModal("通知", m_error[language], "");
                    }
                });
            };
        });
    })(jQuery);
</script>
