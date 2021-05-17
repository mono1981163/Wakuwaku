<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/manage/delivery.css');?>"/>
<style>
    .item-title {
        height: 54px;
    }
    .item-input {
        height: 54px;
    }
</style>
<div class="content">
    <div class="main-content">
        <div class="detail_pid">
            <p>注文ID:&nbsp;</p>
            <?php echo $purchase_id;?>
        </div>
        <div class="b-t"></div>
        <div class="detail_status">
            <p class="detail_la"><?php echo $delivery_state?></p>
        </div>
        <div class="p-status-div">
            <div class="p-status-con">
                <p>注文ID:&nbsp;</p>
                <?php echo $purchase_id;?>
            </div>
            <div class="p-status-con">
                <p>最終ガチャ日:&nbsp;</p>
                <?php echo $end_date;?>
            </div>
            <div class="p-status-con">
                <p>発送日:&nbsp;</p>
                <?php echo $shipment_date;?>
            </div>
        </div>
        <div class="user_info">
            <div class="purchase-info">
                <div class="form-box">
                    <div class="item-title">
                        <div>ユ一ザ一ID:</div> 
                    </div>
                    <div class="item-input">
                        <p><?php echo $customer_id;?></p>
                    </div>
                </div>
                <div class="form-box">
                    <div class="item-title">
                        <div>国</div>
                    </div>
                    <div class="item-input">
                        <p><?php echo $country;?></p>
                    </div>
                </div>
                <div class="form-box">
                    <div class="item-title">
                        <div>住所</div>
                    </div>
                    <div class="item-input">
                        <p>〒<?php echo $zip_code?><br>
                        <?php echo $prefecture?>&nbsp;<?php echo $city?><br>
                        <?php echo $roomno?></p>
                    </div>
                </div>
                <div class="form-box">
                    <div class="item-title">
                        <div>メールアドレス</div>
                    </div>
                    <div class="item-input">
                        <p><?php echo $email?></p>
                    </div>
                </div>
                <div class="form-box">
                    <div class="item-title">
                        <div>電話番号</div>
                    </div>
                    <div class="item-input">
                        <p><?php echo $phone;?></p>
                    </div>
                </div>
                <div class="form-box">
                    <div class="item-title">
                        <div>郵便番号</div>
                    </div>
                    <div class="item-input">
                        <p><?php echo 20210508122311?></p>
                    </div>
                </div>
                <div class="form-box">
                    <div class="item-title">
                        <div>追跡番号</div>
                    </div>
                    <div class="item-input">
                        <p><?php echo $track_number?></p>
                    </div>
                </div>
                <div class="form-box last-box">
                    <div class="item-title">
                        <div>管理メモ</div>
                    </div>
                    <div class="item-input">
                        <p><?php echo $manage_memo?></p>
                    </div>
                </div>
            </div>
            <br><br>
            <h3 class="mb-4"><?php echo $name;?></h3>
            <ul class="list-contain">
                <?php $i=0; foreach ($items as $row) { ?>
                    <li>
                        <div class="d-flex">
                            <div>
                                <img src="<?php echo base_url()."upload/item/".$row['item_img'] ?>" alt="">
                            </div>
                            <div class="r_con">
                                <h5><?php echo $row['prize_name']?></h5>
                                <p>アイテム名 <?php echo $row['item_name'];?></p>
                                <p>獲得個数 <?php echo $row['gained_count'];?></p>
                            </div>
                        </div>
                    </li>
                <?php }?>
            </ul>
            <?php if($delivery_state!="完了") {?>
                <div class='button-group'>
                    <button class='btn btn-custom' onclick='saveTrack()'>追跡番号登録</button>
                    <button class='btn btn-custom btn-danger prizeDelBtn' style = 'background-color: #dc3545; border-color: #dc3545;' onclick='cancelDeliver()'>キャンセル</button>
                </div>
            <?php }?>
        </div>
    </div>
</div>
<script>
    var base_url = "<?php echo base_url();?>";
    function saveTrack() {
        var purchase_id = "<?php echo $purchase_id?>";
        $.post(base_url + "Purchase_detail/deliver_prize", {purchase_id: purchase_id}, function() {location.reload();});
    };
    function cancelDeliver() {
        if(confirm("本当に削除しますか？!")) {
            var purchase_id = "<?php echo $purchase_id?>";
            $.post(base_url + "Purchase_detail/cancel_deliver", {purchase_id: purchase_id}, function() {location.reload();});
        };
    };
</script>