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
        <h1 class="text-left"><?php echo lang('purchase_detail_confirmation')?></h1>
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
                        <img src="<?php echo base_url('assets/image/purchase/visa.png')?>" alt="">
                        <h4><?php echo lang('credit')?></h4>
                        <h4><?php echo $cardnumber?></h4>
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
</script>