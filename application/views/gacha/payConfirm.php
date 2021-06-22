<link rel="stylesheet" href="<?php echo base_url("assets/css/gacha.css"); ?>">
<script type="text/javascript" src="https://js.pay.jp/"></script>
<div class="content">
    <div class="step_part">
        <div class="step_area">
            <div class="step_contents">
                <div>
                    <div class="step_circle_container first_step step_line_active">
                        <div class="step_circle b--green"></div>
                    </div>
                    <h5><?php echo lang('payment_method_option')?></h5>
                </div>
                <div>
                    <div class="step_circle_container first_step">
                        <div class="step_circle b--green"></div>
                    </div>
                    <h5 class="font--green"><?php echo lang('purchase_content_confirm')?></h5>
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
        <h1><?php echo lang('purchase_detail_confirmation')?></h1>
        <div class="basic-content payconfirm">
            <div class="pay_info">
                <div class="part">
                    <div class="img_contain">
                        <img src="<?php echo base_url('upload/gacha/').$image?>" alt="">
                    </div>
                    <div class="product_amount">
                        <h3><?php echo lang('purchase_product_amount')?></h3>
                        <h4><?php echo $name?></h4>
                        <h4><?php echo lang('unit_price')?>:&nbsp;<?php echo $price?><?php echo lang('money_unit')?>/<?php echo lang('times')?></h4>
                        <h4><?php echo lang('number_of_times')?>:&nbsp;<?php echo $purchase_times?><?php echo lang('times')?></h4>
                        <h4><?php echo lang('subtotal')?>:&nbsp;<?php echo $price * $purchase_times?><?php echo lang('money_unit')?></h4>
                        <h4><?php echo lang('delivery_fee')?>:&nbsp;<?php echo $shipping_fee?><?php echo lang('money_unit')?></h4>
                        <h4><?php echo lang('total')?>:&nbsp;<?php echo $amount+$shipping_fee?><?php echo lang('money_unit')?></h4>
                    </div>
                </div>
                <hr>
                <div class="part">
                    <div class="payment">
                        <h3><?php echo lang('payment_info')?></h3>
                        <img id="cardImage" src="" alt="">
                        <h4><?php echo lang('credit')?></h4>
                        <h4 class="card-number"></h4>
                    </div>
                    <div class="address">
                        <h3><?php echo lang('shipping_address')?></h3>
                        <h4><?php echo $surname1?>&nbsp;<?php echo $name1?></h4>
                        <h4>〒<?php echo substr($zip_code,0,3)?>-<?php echo substr($zip_code,3,4)?></h4>
                        <h4><?php echo $prefecture?>&nbsp;<?php echo $city?></h4>
                        <h4><?php echo $roomno?></h4>
                        <h4>TEL&nbsp;:&nbsp;<?php echo substr($phone,0,3)?>-<?php echo substr($phone,4,4)?>-<?php echo substr($phone,7,4)?></h4>
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
                            <button class="button--second" onclick="payJpProcess()"><?php echo lang('spin_gacha')?></button>
                            <button class="button" onclick="window.history.back();"><?php echo lang('go_pay_selection')?></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="button-group">
            <button class="button" onclick="window.history.back();"><?php echo lang('go_pay_selection')?></button>
            <button class="button--second" onclick="payJpProcess()"><?php echo lang('spin_gacha')?></button>
        </div>
    </div>
</div>
<!-- https://stackoverflow.com/questions/72768/how-do-you-detect-credit-card-type-based-on-number -->
<script>
    var base_url = "<?php echo base_url()?>";
    function payJpProcess() {
        var purchase_times = <?php echo $purchase_times?>;
        var amount = <?php echo $amount + $shipping_fee?>;
        var card_token = '<?php echo $card_token?>';
        var gacha_id = <?php echo $gacha_id?>;
        $.ajax({
            type: 'POST',
            url:base_url + 'Payment/Payjp/payjp_credit',
            data:{
                card_token: card_token,
                amount: amount,
                purchase_times: purchase_times,
                gacha_id: gacha_id
            },
            success:function(response) {
                if (response == "success") {
                    window.location.href='<?php echo base_url()?>Gacha/Purchase/complete';
                } else {

                };
            },
            error:function(XMLHttpRequest, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
    }
    function GetCardType(number) {
        // visa
        var re = new RegExp("^4");
        if (number.match(re) != null)
            return "Visa";

        // Mastercard
        re = new RegExp("^5[1-5]");
        if (number.match(re) != null)
            return "Mastercard";

        // AMEX
        re = new RegExp("^3[47]");
        if (number.match(re) != null)
            return "AMEX";

        // Discover
        re = new RegExp("^(6011|622(12[6-9]|1[3-9][0-9]|[2-8][0-9]{2}|9[0-1][0-9]|92[0-5]|64[4-9])|65)");
        if (number.match(re) != null)
            return "Discover";

        // Diners
        re = new RegExp("^38");
        if (number.match(re) != null)
            return "Diners";

        // Diners - Carte Blanche
        re = new RegExp("^30[0-5]");
        if (number.match(re) != null)
            // return "Diners-Carte";
            return "Diners";

        // JCB
        re = new RegExp("^35(2[89]|[3-8][0-9])");
        if (number.match(re) != null)
            return "JCB";

        // Visa Electron
        re = new RegExp("^(4026|417500|4508|4844|491(3|7))");
        if (number.match(re) != null)
            return "Visa Electron";
        return "unknown";
    }
    $(document).ready(function() {
        var cardnumber = "<?php echo $cardnumber?>";
        var hiddenCard = cardnumber;
        var passlen = hiddenCard.length;
        var hiddenLen = Math.floor(passlen*0.7);
        for(var i=0; i<hiddenLen; i++) {
            var random = Math.floor(Math.random() * passlen);
            if(hiddenCard.substring(random, random+1) == "*") {
                hiddenLen++;
            } else if(hiddenCard.substring(random, random+1) != "") {
                hiddenCard = hiddenCard.replace(hiddenCard.substring(random, random+1),"*");
            }
        }
        $('.card-number').text(hiddenCard);
        var creditNumber = cardnumber.replace(/\s/g, "");
        var cardType = GetCardType(creditNumber);
        console.log(cardType);
        if(cardType == "Visa") {
            document.getElementById("cardImage").src = "<?php echo base_url('assets/image/purchase/visa.png')?>";
        } else if(cardType == "Mastercard") {
            document.getElementById("cardImage").src = "<?php echo base_url('assets/image/purchase/mastercard.png')?>";
        } else if(cardType == "AMEX") {
            document.getElementById("cardImage").src = "<?php echo base_url('assets/image/purchase/americanExpress.png')?>";
        } else if(cardType == "Diners") {
            document.getElementById("cardImage").src = "<?php echo base_url('assets/image/purchase/dinersClub.png')?>";
        } else if(cardType == "JCB") {
            document.getElementById("cardImage").src = "<?php echo base_url('assets/image/purchase/jcb.png')?>";
        } else {
            console.log("cardType unknown");
        }
    });
</script>