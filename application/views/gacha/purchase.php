<link rel="stylesheet" href="<?php echo base_url("assets/css/gacha.css"); ?>">
<script type="text/javascript" src="https://js.pay.jp/"></script>
<style>
    .radio_contain input[type="radio"] + * {
        width: unset;
    }
</style>
<div class="content">
    <div class="step_part">
        <div class="step_area">
            <div class="step_contents">
                <div>
                    <div class="step_circle_container first_step">
                        <div class="step_circle b--green"></div>
                    </div>
                    <h5 class="font--green"><?php echo lang('payment_method_option')?></h5>
                </div>
                <div>
                    <div class="step_circle_container">
                        <div class="step_circle"></div>
                    </div>
                    <h5><?php echo lang('purchase_content_confirm')?></h5>
                </div>
                <div>
                    <div class="step_circle_container last_step">
                        <div class="step_circle"></div>
                    </div>
                    <h5><?php echo lang('purchase_end')?></h5>
                </div>
            </div>
        </div>
    </div>
    <div class="main-content">
        <h1 class="main-title"><?php echo lang('select_payment_method')?></h1>
        <div class="basic-content">
            <div class="pay_info">
                <div class="info-box">
                    <div class="radio_contain">
                        <input id="credit" type="radio" class="radio" checked value="credit">
                        <label for="credit"><?php echo lang('credit')?></label>
                    </div>
                    <div class="pay_contain">
                        <form id="creditForm" action="<?php echo base_url('Gacha/Purchase/pay_confirm')?>" method="post" enctype="multipart/form-data">
                            <div class="card_type">
                                <div><img src="<?php echo base_url()?>/assets/image/purchase/visa.png"></div>
                                <div><img src="<?php echo base_url()?>/assets/image/purchase/mastercard.png"></div>
                                <div><img src="<?php echo base_url()?>/assets/image/purchase/jcb.png"></div>
                                <div><img src="<?php echo base_url()?>/assets/image/purchase/americanExpress.png"></div>
                                <div><img src="<?php echo base_url()?>/assets/image/purchase/dinersClub.png"></div>
                            </div>
                            <div class="inner-box">
                                <h4 class="need" for="payjp_cardNumber"><?php echo lang('card_number')?></h4>
                                <input id="payjp_cardNumber" name="cardnumber" value="4242424242424242" class="payjp_input_text" type="tel" autocomplete="off" placeholder="例：4444 5555 6666 7777" maxlength="19" pattern="([0-9]| )*">
                                <input name="card_token" type="hidden">
                                <input name="purchase_times" type="hidden" value="<?php echo $purchase_times?>">
                                <input name="amount" type="hidden" value="<?php echo $amount?>">
                                <input name="gacha_id" type="hidden" value="<?php echo $gacha_id?>">
                            </div>
                            <div class="inner-box">
                                <h4 class="need" for="payjp_cardName"><?php echo lang('card_user')?></h4>
                                <input id="payjp_cardName" name="card_name" type="text" inputtype="email" value="Yoshino" placeholder="例：TARO YAMADA">
                            </div>
                            <div class="inner-box">
                                <h4 class="need" for=""><?php echo lang('expiration_date')?></h4>
                                <input class="small-input" name="card_exp_month" inputtype="number" value="12" placeholder="例：12" type="tel" maxlength="2"><span class="slash">/</span>
                                <input class="small-input" name="card_exp_year" inputtype="number" value="24" placeholder="例：28" type="tel" maxlength="2">
                            </div>
                            <div class="inner-box">
                                <h4 class="need" class="cvc_label" for="payjp_cardCvc"><?php echo lang('secret_code')?></h4>
                                <input id="payjp_cardCvc" class="small-input" type="tel" name="cvc" placeholder="例：123"  value="1245" maxlength="4">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="info-box">
                    <div class="radio_contain">
                        <input id="alipay" type="radio" class="radio" value="alipay">
                        <label for="alipay">Alipay</label>
                    </div>
                    <div class="pay_contain">
                        <form id="univapayForm" action="https://gw.ccps.jp/payment.aspx" method="get">
                            <input type="hidden" name="sid" value="109859">
                            <input type="hidden" name="svid" value="6">
                            <input type="hidden" name="ptype" value="3">
                            <input type="hidden" name="lang" value="cn">
                            <input type="hidden" name="job" value="REQUEST">
                            <input type="hidden" name="sod" value="test_shop_order_number">
                            <input type="hidden" name="siam1" value="<?php echo $amount?>">
                            <input type="hidden" name="sisf1" value="<?php echo $shipping_fee?>">
                            <input type="hidden" name="em" value="<?php echo $this->session->userdata('email')?>">
                            <input type="hidden" name="tn" value="08012344321">
                            <input type="hidden" name="sucd" value="123">
                        </form>
                        <h4><?php echo lang('purchase_text')?></h4>
                    </div>
                </div>
            </div>
            <div class="purchase_box">
                <div class="info-box">
                    <div class="purchase_info">
                        <div>
                            <h4 class="text-center"><?php echo $name?></h4>
                        </div>
                        <div>
                            <h4><?php echo lang('total')?><span class="font--green big_text"><?php echo $purchase_times?><?php echo lang('times')?></span>&nbsp;<span class="font--green big_text"><?php echo $amount?></span><?php echo lang('money_unit')?></h4>
                            <h4><?php echo lang('delivery_fee')?><span class="font--green big_text"><?php echo $shipping_fee?></span><?php echo lang('money_unit')?></h4>
                        </div>
                        <hr>
                        <div>
                            <h4><?php echo lang('total')?><?php echo lang('tax_include')?><span class="font--green big_text"><?php echo $shipping_fee + $amount?></span></h4>
                            <button class="button--second credit_button"><?php echo lang('go_purchase_procedure')?></button>
                            <button class="button" onclick="window.history.back();"><?php echo lang('go_gacha_detail')?></button>
                        </div>
                        <div>
                            <h6><?php echo lang('times_change_text')?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="button-group">
            <button class="button" onclick="window.history.back();"><?php echo lang('go_gacha_detail')?></button>
            <button class="button--second credit_button"><?php echo lang('go_purchase_procedure')?></button>
        </div>
    </div>
</div>
<?php $this->load->view('template/language.php');?>
<script>
    var base_url = "<?php echo base_url()?>";
    var card_token = "";
    Payjp.setPublicKey("pk_test_00f47631405110d2b3e31fe3");
    $(document).ready(function() {
        $('.radio').change(function(){
            $('.radio').not(this).prop('checked', false);
        });
        $('.credit_button').click(function() {
            var exp_year = "20" + document.querySelector('input[name="card_exp_year"]').value;
            var card = {
                number: document.querySelector('input[name="cardnumber"]').value,
                cvc: document.querySelector('input[name="cvc"]').value,
                exp_month: document.querySelector('input[name="card_exp_month"]').value,
                exp_year: exp_year,
                name: document.querySelector('input[name="card_name"]').value
            };
            Payjp.createToken(card, function(status, response) {
                
                if (status == 200) {
                    card_token = response.id;
                    $('input[name=card_token]').val(card_token);
                    $('#creditForm').submit();
                } else {
                    console.log(response);
                    $('#credit').text('<p class="error-txt"><?php echo lang('card_information_error')?></p>');
                };
            });
        })
    });
    $('#payjp_cardNumber').on('keyup', function(e){
        var val = $(this).val();
        var newval = '';
        val = val.replace(/\s/g, '');
        for(var i = 0; i < val.length; i++) {
            if(i%4 == 0 && i > 0) newval = newval.concat(' ');
            newval = newval.concat(val[i]);
        }
        $(this).val(newval);
    });
    document.getElementById("alipay").addEventListener('click', function() {
        $('#univapayForm').submit();
    });
</script>