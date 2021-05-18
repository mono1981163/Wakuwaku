<!-- <link rel="stylesheet" type="text/css" href="<?= base_url('assets/slick/slick.css');?>"/>
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/slick/slick-theme.css');?>"/> -->
<link rel="stylesheet" href="<?php echo base_url("assets/css/gacha.css"); ?>">
<style>
    .select-with-radio{
        display: flex;
        align-items: center;
-
    }
    .select-with-select{
        display: flex;
        align-items: center;

    }

    .modal-dialog {
        width: 80%;
        top:15%;
    }
    .slick-slide {
        max-height: 500px;
        padding: 0px 20vw;
        /* width: auto!important; */
    }
    .slick-next {
        right: 10px;
        z-index: 10;
    }
    .slick-prev {
        left: 10px;
        z-index: 10;
    }
    .slick-prev:before, .slick-next:before {
        color: #1a202e;
    }
    @media (min-width: 576px) {
        .modal-dialog {
            max-width: unset;
        }
    }
</style>
<div class="content">
    <img src="<?php echo base_url()."upload/gacha/".$result[0]['image']?>" class="gacha_image_pc" alt="">
    <img src="<?php echo base_url()."upload/gacha/".$result[0]['image_sp']?>" class="gacha_image_sp" alt="">
    <?php if($remainder_ticket != null && $remainder_ticket > 0) {?>
        <div class="ticket_banner">
            <div>
                <h3><?php echo lang('unused_gacha_ticket')?><span class="font--green big_text"><?php echo $remainder_ticket?></span><span class="font--green"><?php echo lang('times')?></span><?php echo lang('there_is')?></h3>
                <form id="playForm" action="<?php echo base_url('Gacha/Gachaplay/gacha_conduct')?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="play" value="<?php echo $result[0]['gacha_id']?>">
                    <input type="hidden" name="is_play" value="ok">
                </form>
                <button class="button--second" onclick="document.getElementById('playForm').submit();"><?php echo lang('turn_gacha')?></button>
            </div>
        </div>
    <?php }?>
    <div class="period_banner">
        <h4 class="font--white"><?php echo lang('period_of_sale')?>:&nbsp;&nbsp;<?php echo $result[0]['start_date']?>&nbsp;12:00&nbsp;~&nbsp;<?php echo $result[0]['end_date']?>&nbsp;23:59</h4>
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
                        <h3><?php echo lang('tax_include')?><span class="font--green big_text"><?php echo $result[0]['price']?></span><?php echo lang('money_unit')?>/<?php echo lang('times')?></h3>
                    </div>
                </div>
                <div class="second">
                    <h3 class="sp"><?php echo lang('select_times')?></h3>
                    <div class="select_contain">
                        <div class="select-with-radio">
                            <!-- <label for=""><input type="radio" name="radio" class="custom" value="0" checked></label> -->
                            <div class="switch">
                                <input name="switch" id="one" type="radio" value="5" checked/>
                                <label for="one" onclick="set_radio_amount1(5)" class="switch__label">5</label>
                                <input name="switch" id="two" type="radio" value="10"/>
                                <label for="two" onclick="set_radio_amount1(10)" class="switch__label">10</label>
                                <input name="switch" id="three" type="radio" value="20"/>
                                <label for="three" onclick="set_radio_amount1(20)" class="switch__label">20</label>
                                <div class="switch__indicator"></div>
                            </div>
                        </div>
                        <div class="select-with-select">
                            <!-- <label for=""><input type="radio" name="radio"  class="custom" value="1"></label> -->
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
                        </div>
                        <!-- <span><?php echo lang('times')?></span> -->
                    </div>
                </div>
                <div>
                    <div>
                        <h3><?php echo lang('total')?><span id="times" onchange="setTimes();" class="font--green big_text">5</span><?php echo lang('times')?><span id="amount" class="font--green big_text"><?php echo $result[0]['price'] ?></span><?php echo lang('money_unit')?>(<?php echo lang('tax_include')?>)</h3>
                        <form id="toPay" action="<?php echo base_url('Gacha/Purchase/gacha_purchase')?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="gacha_id" value="<?php echo $result[0]['gacha_id']?>">
                            <input id="purchase_times" type="hidden" name="purchase_times" value="">
                            <input id="purchase_amount" type="hidden" name="amount" value="">
                            <button type="submit" class="button--second"><?php echo lang('to_payment')?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-content">
        <div class="info-container">
            <h3><?php echo lang('prize_list');?></h3>
            <div class="sale-list">
                <?php foreach ($result as $row) { if($row != "") {?>
                    <div class="prize">
                        <img src="<?php echo base_url()."upload/prize/".$row['prize_img'] ?>" onclick="showItems(<?php echo $row['id']?>);" alt="">
                        <button class="button-green"><?php echo $row['prize_name']?></button>
                        <h5><?php echo $row['goods']?></h5>
                    </div>
                <?php }}?>
            </div>
        </div>
        <div class="info-container">
            <h3><?php echo lang('gacha_detail');?></h3>
            <div class="info-box">
                <div class="form-box">
                    <div class="item-title">
                        <div><?php echo lang('period_of_sale');?></div>
                    </div>
                    <div class="item-input">
                        <div>
                            <h4><?php echo $result[0]['start_date']?>&nbsp;12:00 ~ <?php echo $result[0]['end_date']?>&nbsp;23:59</h4>
                        </div>
                    </div>
                </div>
                <div class="form-box">
                    <div class="item-title">
                        <div><?php echo lang('price');?></div>
                    </div>
                    <div class="item-input">
                        <div>
                            <h4>1<?php echo lang('times')?>550<?php echo lang('money_unit')?>(<?php echo lang('tax_include')?>)</h4>
                        </div>
                    </div>
                </div>
                <div class="form-box">
                    <div class="item-title">
                        <div><?php echo lang('delivery_fee');?></div>
                    </div>
                    <div class="item-input">
                        <div>
                            <h4>20<?php echo lang('pieces');?><?php echo $result[0]['shipping_fee']?><?php echo lang('money_unit');?></h4>
                        </div>
                    </div>
                </div>
                <div class="form-box">
                    <div class="item-title">
                        <div><?php echo lang('delivery_time_rule');?></div>
                    </div>
                    <div class="item-input">
                        <div>
                            <h4><?php echo lang('after_end_of_sale_period');?><?php echo $result[0]['estimated_delivery_time']?><?php echo lang('shipped_within');?></h4>
                        </div>
                    </div>
                </div>
                <div class="form-box">
                    <div class="item-title">
                        <div><?php echo lang('remarks');?></div>
                    </div>
                    <div class="item-input">
                        <div>
                            <h4><?php echo $result[0]['remarks']?>かってください</h4>
                        </div>
                    </div>
                </div>
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
                        <h3><?php echo lang('tax_include')?><span class="font--green big_text"><?php echo $result[0]['price']?></span><?php echo lang('money_unit')?>/<?php echo lang('times')?></h3>
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
                        <select name="quantity" id="quantity_select1" class="select_box" onchange="setAmount1()">
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
                    <h3><?php echo lang('total')?><span id="times1" class="font--green big_text">5</span><?php echo lang('times')?><span id="amount1" class="font--green big_text"><?php echo $result[0]['price'] ?></span><?php echo lang('money_unit')?>(<?php echo lang('tax_include')?>)</h3>
                    <button class="button--second" onclick="paySelection();"><?php echo lang('to_payment')?></button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="modal-title font-weight-bold"></div>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button data-dismiss="modal" aria-label="Close" style="margin: auto" type="button" class="btn btn-custom"><?php echo lang('close');?></button>
      </div>
    </div>
  </div>
</div>
<script>
    var base_url = "<?php echo base_url();?>";
    function showItems(prize_id) {
        $.ajax({
            url: base_url+"Gacha/Prize/get_all_items",
            type: 'post',
            data: {prize_id: prize_id},
            dataType: 'json',
            success: function(response) {
                var message = '<div class="autoplay slide-container">';
                response.map(function(item) {
                    var newItem = item.replace(")","");
                    var item_prop = newItem.split(","); 
                    message += '<img src="<?php echo base_url('upload/item/')?>'+ item_prop[3] +'">'
                });
                message += '</div>';
                $('.modal-body').html(message);
                $("#Modal").modal({
                    backdrop: 'static',
                    keyboard: false
                });
                $('.autoplay').slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    autoplay: false,
                });
                document.querySelector(".slick-next").click();
            }, 
            error: function(err) {

            }
        });
    }
    $(document).ready(function() {
        var times = $('input[type=radio]:checked').val();
        document.getElementById("amount").innerHTML = <?php echo $result[0]['price'] ?> * times;
        document.getElementById("purchase_times").value = times;
        document.getElementById("purchase_amount").value = <?php echo $result[0]['price'] ?> * times;
        $('#times').on('DOMSubtreeModified',function(){
            document.getElementById('purchase_times').value = document.getElementById('times').innerHTML;
            document.getElementById('purchase_amount').value = document.getElementById('times').innerHTML * <?php echo $result[0]['price']?>;
        })
    });
    function paySelection() {
        $('#toPay').submit();
    }
    function setAmount() {
        let element = document.getElementById("quantity_select1");
        element.value = document.getElementById("quantity_select").value;
        document.getElementById("amount").innerHTML = <?php echo $result[0]['price'] ?> * document.getElementById("quantity_select").value;
        document.getElementById("times").innerHTML = document.getElementById("quantity_select").value;
        document.getElementById("amount1").innerHTML = <?php echo $result[0]['price'] ?> * document.getElementById("quantity_select").value;
        document.getElementById("times1").innerHTML = document.getElementById("quantity_select").value;
    }
    function setAmount1() {
        let element = document.getElementById("quantity_select");
        element.value = document.getElementById("quantity_select1").value;
        $("#quantity_select[value=" + document.getElementById("quantity_select1").value + "]").prop('checked', true);
        document.getElementById("amount").innerHTML = <?php echo $result[0]['price'] ?> * document.getElementById("quantity_select1").value;
        document.getElementById("times").innerHTML = document.getElementById("quantity_select1").value;
        document.getElementById("amount1").innerHTML = <?php echo $result[0]['price'] ?> * document.getElementById("quantity_select").value;
        document.getElementById("times1").innerHTML = document.getElementById("quantity_select").value;
    }
    function set_radio_amount(times) {
        $("input[name=switch][value=" + times + "]").prop('checked', true);
        document.getElementById("amount").innerHTML = <?php echo $result[0]['price'] ?> * times;
        document.getElementById("times").innerHTML = times;
        document.getElementById("amount1").innerHTML = <?php echo $result[0]['price'] ?> * times;
        document.getElementById("times1").innerHTML = times;    
    }

    function set_radio_amount1(times) {
        $("input[name=switch1][value=" + times + "]").prop('checked', true);
        document.getElementById("amount").innerHTML = <?php echo $result[0]['price'] ?> * times;
        document.getElementById("times").innerHTML = times;
        document.getElementById("amount1").innerHTML = <?php echo $result[0]['price'] ?> * times;
        document.getElementById("times1").innerHTML = times;
    }
</script>
