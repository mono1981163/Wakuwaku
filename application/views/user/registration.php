<link rel="stylesheet" href="<?php echo base_url("assets/css/user.css"); ?>">
<div class="content">
    <div class="step_part">
        <div class="step_area">
            <div class="step_contents">
                <div>
                    <div class="step_circle_container first_step first">
                        <div class="step_circle b--green"></div>
                    </div>
                    <h5><?php echo lang('member_info_input')?></h5>
                </div>
                <div>
                    <div class="step_circle_container second">
                        <div class="step_circle"></div>
                    </div>
                    <h5><?php echo lang('member_info_confirm')?></h5>
                </div>
                <div>
                    <div class="step_circle_container last_step">
                        <div class="step_circle"></div>
                    </div>
                    <h5><?php echo lang('member_regist_completed')?></h5>
                </div>
            </div>
        </div>
    </div>
    <div class="main-content">
        <div class="data-input">
            <h1 class="text-center"><?php echo lang('member_registraion')?></h1>
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
                                    <input type="text" id="surname1" name="surname1" placeholder="例：山田" value="山田">
                                </div>
                                <div>
                                    <p>名</p>
                                    <input type="text" id="name1" name="name1" placeholder="例：太郎" value="太郎">
                                </div>
                            </div>
                            <div class="item-box japan_name">
                                <div>
                                    <p>セイ</p>
                                    <input type="text" id="surname2" name="surname2" placeholder="例：ヤマダ" value="ヤマダ">
                                </div>
                                <div>
                                    <p>メイ</p>
                                    <input type="text" id="name2" name="name2" placeholder="例：タロウ" value="タロウ">
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
                                <input type="radio" class="radio" id="cb1" name="japan" checked value="日本">
                                <label for="cb1">日本</label>
                                <input type="radio" class="radio" id="cb2" name="china" value="中国">
                                <label for="cb2">中国</label>
                                <h6 class="country_support"><?php echo lang('country_support')?></h6>
                            </div>
                            <div class="zip-code">
                                <p><?php echo lang('zip_code');?></p>
                                <div>
                                    <div class="zip_input"><input type="text" id="zip_code" name="zip_code" maxlength="7" placeholder="例：1530041" value="1530041"></div>
                                    <button class="button"><h5 class="font--green"><?php echo lang('addr_auto_input');?></h5></button>
                                </div>
                                <h5><?php echo lang('zip_search_text1')?><a href="https://www.post.japanpost.jp/zipcode/index.html" target="_blank"><span class="font--green link_color_green"><?php echo lang('search')?></span></a><?php echo lang('zip_search_text2')?></h5>
                            </div>
                            <div class="prefecture">
                                <p><?php echo lang('prefecture');?></p>
                                <input type="text" id="addr3" name="prefecture" placeholder="例：東京都" value="東京都">
                            </div>
                            <div class="city">
                                <p><?php echo lang('city');?></p>
                                <input type="text" id="addr4" name="city" placeholder="例：目黒区駒場9-8-7" value="目黒区駒場9-8-7">
                            </div>
                            <div class="apart">
                                <p><?php echo lang('building');?></p>
                                <input type="text" id="addr6" name="apart" placeholder="例：メゾンドワクワク404号室" value="メゾンドワクワク404号室">
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
                                <input id="phonenumber" name="phonenumber" type="text" maxlength="13" class="" placeholder="例：09012345678" value="08512345678">
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
                                <input id="email" name="mail_address" type="text" value="wabena@gmail.com">
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
                <button class="button--second" id="input-end"><?php echo lang('regist_agree_confirm');?></button>            
            </div>
        </div>
        <div class="data-ensure">
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
                <button id="registration" type="button" onclick="userRegister();" class="button--second"><?php echo lang('member_regist_end')?></button>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('template/language.php');?>
<script>
    var base_url = "<?php echo base_url(); ?>";
    var japanese = true;
    function returnTo() {
        $(".data-input").show();
        $(".data-ensure").hide();
    }
    function userRegister() {
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
        data['phone'] = $("#ensurePhone").text();
        data['email'] = $("#ensureEmail").text();
        data['password'] = $("#password").val();
        $.ajax({
            type: 'post',
            url: base_url + "User/Registration/info_regist",
            data: data,
            success: function (response) {
                if (response == "success") {
                    window.location.href = base_url + "User/Registration/complete"
                } else if (response == "exist") {
                    document.getElementById('error_message').innerHTML = m_email_exist[language];
                    // launchModal("通知", m_email_exist[language], "");

                } else if (response == "error") {
                    document.getElementById('error_message').innerHTML = m_error[language];
                    // launchModal("通知", m_error[language], "");
                } 
            },
            error: function(xhr,status,error) {
                document.getElementById('error_message').innerHTML = m_error[language];
                // launchModal("通知", m_error[language], "");
            }
        });
    }
    (function($) {
        $(".data-input").show();
        $(".data-ensure").hide();
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

        // $(function(){
        //     var errorInput = $('.error-input');
        //     for(var i=0,m=errorInput.length;i<m;i++){
        //         if ($(errorInput[i]).val() == ""){
        //             $(errorInput[i]).addClass('error-input');	
        //         } else{
        //             $(errorInput[i]).removeClass('error-input');	
        //         }
        //     }
        //     $('.error-input').focus(function(){
        //     $(this).removeClass('error-input');
        //     }).blur (function(){
        //         if ($(this).val() == ""){
        //             $(this).addClass('error-input');	
        //         }
        //     });
        // });

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
            // $("#ensureCountry").val(country);
            $("#ensurePhone").text(phonenumber);
            // $("#ensureAddress").text(zip_code + "-" +  addr3 +"-" +  addr4  +"-" +  addr6);
            $("#ensureAddress").append("<p>〒"+zip_code+"</p><p>"+addr3+" "+addr4+"</p><p>"+addr6+"</p>")
            $("#ensureEmail").text(email);
            $("#ensurePwd").text("***********");
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
            
            // if (addr1 == "") {
            //     flag = false;
            //     $("#addr1").parent().before("<p class='error-txt'>郵便番号上3桁を入力してください。</p>");
            //     $("#addr1").addClass("error");
            // }
            // if (addr2 == "") {
            //     flag = false;
            //     $("#addr2").parent().before("<p class='error-txt'>郵便番号下4桁を入力してください。</p>");
            //     $("#addr2").addClass("error");
            // }
            // if (addr3 == "") {
            //     flag = false;
            //     $("#addr3").parent().before("<p class='error-txt'>県は必須です。</p>");
            //     $("#addr3").addClass("error");
            // }
            // if (addr1 !== "" && !addr1.match(numbers)) {
            //     flag = false;
            //     $("#addr1").parent().before("<p class='error-txt'>郵便番号上3桁を入力してください。</p>");
            //     $("#addr1").setAttribute("class", "error");
            // }
            // if (addr2 !== "" && !addr2.match(numbers)) {
            //     flag = false;
            //     $("#addr2").parent().before("<p class='error-txt'>郵便番号下4桁を入力してください。</p>");
            //     $("#addr2").addClass("error");
            // }
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
                $(".data-input").hide();
                $(".data-ensure").show();
                $(".first").addClass("step_line_active");
                $(".second").addClass("first_step");
                $(".second .step_circle").addClass("b--green");
            };
        });
    })(jQuery);
</script>

