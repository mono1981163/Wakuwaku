<link rel="stylesheet" href="<?php echo base_url("assets/css/gacha.css"); ?>">
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
                    <div class="step_circle_container last_step step_line_active">
                        <div class="step_circle b--green"></div>
                    </div>
                    <h5><?php echo lang('purchase_end')?></h5>
                </div>
            </div>
        </div>
    </div>
    <div class="main-content">
        <div class="page_title">
            <h6><span class="font--green link_color_green">HOME</span> > <span class="font--green link_color_green"><?php echo $gacha_name?></span> > <?php echo lang('purchase_completed');?></h6>
        </div>
        <div class="step-under">
            <div class="input_contain">
                <div class="box">
                    <h1 class="text-center"><?php echo lang('purchase_completed');?></h1>
                    <img class="check_img" src="<?php echo base_url('assets/image/user/arrow.png')?>" alt="">
                    <h3 class="text-center"><?php echo lang('purchase_complete_text1');?></h3>
                    <h3 class="text-center"><?php echo lang('purchase_complete_text2');?></h3>
                </div>
            </div>
            <form id="playForm" action="<?php echo base_url('Gacha/Gachaplay/gacha_conduct')?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="play" value="<?php echo $gacha_id?>">
                <input type="hidden" name="is_play" value="ok">
            </form>
            <div class="button-group">
                <button class="button--second" onclick="document.getElementById('playForm').submit();"><?php echo lang('turn_gacha');?></button>
            </div>
        </div>
    </div>
    <div class="ticket_setting">
        <div class="ticket_bar">
            <div class="pc">
                <h3><?php echo lang('unit_price')?></h3>
                <h3><?php echo lang('select_times')?></h3>
                <h3><?php echo lang('purchase_process')?></h3>
            </div>
            <div>
                <div class="first">
                    <h3 class="sp"><?php echo lang('unit_price')?></h3>
                    <div>
                        <h3><?php echo lang('tax_include')?><span class="font--green big_text"><?php echo $price?></span><?php echo lang('money_unit')?>/<?php echo lang('times')?></h3>
                    </div>
                </div>
                <div class="second">
                    <h3 class="sp"><?php echo lang('select_times')?></h3>
                    <div class="select_contain">
                        <div class="switch">
                            <input name="switch1" id="one1" type="radio" value="5" checked/>
                            <label for="one1" onclick="set_radio_amount(5)" class="switch__label">5</label>
                            <input name="switch1" id="two1" type="radio" value="10" />
                            <label for="two1" onclick="set_radio_amount(10)" class="switch__label" >10</label>
                            <input name="switch1" id="three1" type="radio" value="20"/>
                            <label for="three1" onclick="set_radio_amount(20)" class="switch__label">20</label>
                            <div class="switch__indicator"></div>
                        </div>
                        <select name="quantity" id="quantity_select" class="select_box" onchange="setAmount()">
                            <option value="1" selected>1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                        </select>
                        <!-- <span><?php echo lang('times')?></span> -->
                    </div>
                </div>
                <div>
                    <h3><?php echo lang('total')?><span id="times" class="font--green big_text">5</span><?php echo lang('times')?><span id="amount" class="font--green big_text"><?php echo $price ?></span><?php echo lang('money_unit')?>(<?php echo lang('tax_include')?>)</h3>
                    <form id="toPay" action="<?php echo base_url('Gacha/Purchase/gacha_purchase')?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="gacha_id" value="<?php echo $gacha_id?>">
                        <input id="purchase_times" type="hidden" name="purchase_times" value="">
                        <input id="purchase_amount" type="hidden" name="amount" value="">
                        <button type="submit" class="button--second"><?php echo lang('to_payment')?></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        var times = $('input[type=radio]:checked').val();
        document.getElementById("amount").innerHTML = <?php echo $price?> * times;
        document.getElementById("purchase_times").value = times;
        document.getElementById("purchase_amount").value = <?php echo $price?> * times;
        $('#times').on('DOMSubtreeModified',function(){
            document.getElementById('purchase_times').value = document.getElementById('times').innerHTML;
            document.getElementById('purchase_amount').value = document.getElementById('times').innerHTML * <?php echo $price ?>;
        })
    });
    function paySelection() {
        $('#toPay').submit();
    }
    function setAmount() {
        document.getElementById("amount").innerHTML = <?php echo $price ?> * document.getElementById("quantity_select").value;
        document.getElementById("times").innerHTML = document.getElementById("quantity_select").value;
    }
    function set_radio_amount(times) {
        document.getElementById("amount").innerHTML = <?php echo $price ?> * times;
        document.getElementById("times").innerHTML = times;
    }
</script>