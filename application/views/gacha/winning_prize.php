<link rel="stylesheet" href="<?php echo base_url("assets/css/gacha.css"); ?>">
<div class="content">
    <div class="main-content">
        <div class="page_title">
            <h6><span class="font--green link_color_green">HOME</span> > <span class="font--green link_color_green"><?php echo $gacha_name?></span> > <?php echo lang('gacha_prize');?></h6>
        </div>
        <div class="win_item">
            <?php if(isset($prize_name)) {?>
            <img src="<?php echo base_url('upload/item/').$item_image?>" class="item_image" alt="">
            <div class="">
                <button class="button-green"><?php echo $prize_name?></button>
                <h4><?php echo $item_name?><?php echo lang('prize_won_text')?></h4>
            </div>
            <?php } else {?>
                <img src="<?php echo base_url('assets/image/post.png')?>" class="item_image">
            <?php }?>
            <div>
                <span class="font--green link_color_green"><?php echo lang('tweet')?></span>
                <span class="font--green link_color_green" onclick="window.location.href='<?php echo base_url('Mypage/Detail/order_history')?>'"><?php echo lang('win_prize_view')?></span>
                <?php if($remainder_ticket == "0") {?> 
                    <div class="ticket_addition">
                        <p><?php echo lang('ticket_addition_text1')?></p>
                        <span class="font--green link_color_green" onclick="window.location.href='<?php echo base_url('Gacha/Purchase/gacha_detail/'.$gacha_id)?>'"><?php echo lang('ticket_addition_text2')?></span>
                        <span><?php echo lang('ticket_addition_text1')?></span>
                    </div>
                <?php } else {?>
                    <div>
                        <p><?php echo lang('remain')?><span class="font--green"><?php echo $remainder_ticket?></span><?php echo lang('times')?></p>
                    </div>
                    <form id="playForm" action="<?php echo base_url('Gacha/Gachaplay/gacha_conduct')?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="play" value="<?php echo $gacha_id?>">
                        <input type="hidden" name="is_play" value="ok">
                    </form>
                    <div class="button-group">
                        <button class="button--second" onclick="document.getElementById('playForm').submit();"><?php echo lang('one_more_play');?></button>
                    </div>
                <?php } ?>
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