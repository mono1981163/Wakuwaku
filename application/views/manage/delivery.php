<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/manage/delivery.css');?>"/>

<style>
    .table td {
        padding: 0;
        vertical-align: middle;
    }
    .pagination {
        display: block;
        text-align: center;
    }
    .pagination a, .pagination strong {
        width: 30px;
        height: 30px;
        line-height: 30px;
        text-align: center;
        text-decoration: none;
        border-style: none;
        border-radius: 4px;
        margin: 1px;
        display: inline-block;
        color: white;
        font-weight: 600;
    }
    .pagination a {
        background-color: green;
    }
    .pagination a:hover {
        background-color: #40da40;
    }
    .pagination strong {
        background-color: #007bff;
    }
    .purchase_state {
        width: 100px; 
        border: 1px solid black; 
        text-align: center;
        font-size: 16px;
    }
    .purchase_line {
        margin-top: 20px;
    }
    .table {
        justify-content: center;
        align-items: center;
    }
</style>
<div class="content">
    <div class="main-content">
        <div class="tab pt-5">
            <button class="tablink All_purchase" onclick="moveTab('All_purchase', this)"><span class="a-border">全ての注文</span></button>
            <button class="tablink Not_send" onclick="moveTab('Not_send', this)"><span class="a-border">未発送</span></button>
            <button class="tablink Complete" onclick="moveTab('Done', this)"><span class="a-border">完了</span></button>
        </div>

        <div id="All_purchase" class="tabcontent box1">
            <table id="table1" class="table">
                <tbody>
                    <?php $n=1;
                        foreach($InboxMessage as $purchase){?>
                            <tr>
                                <td>
                                    <div>
                                        <div class="purchase_state">
                                            <?php echo $purchase->delivery_state;?>
                                        </div>
                                        <div class="purchase_line" style="display: flex">
                                            <p class="font-weight-bold">注文番号 : &nbsp;</p>
                                            <span class="purchase_id"><?php  echo $purchase->purchase_id;?></span>
                                        </div>
                                        <div style="display: flex">
                                            <p class="font-weight-bold">¥<?php echo $purchase->price;?> -&nbsp;</p>
                                            <?php echo $purchase->method;?>
                                        </div>
                                        <div style="display: flex">
                                            <p class="font-weight-bold">ユーザー識別コード : &nbsp;</p>
                                            <?php echo $purchase->customer_id;?>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <div style="display: flex;">
                                            <p style="font-weight: bold;">ガチャID : &nbsp;</p>
                                            <?php echo $purchase->gacha_id;?>
                                        </div>
                                        <div style="display: flex">
                                            <p class="font-weight-bold">ガチャ名:&nbsp;</p>
                                            <?php echo $purchase->name;?>
                                        </div>
                                        <div style="display: flex">
                                            <p class="font-weight-bold">最終ガチャ日:&nbsp;</p>
                                            <?php echo $purchase->end_date;?>
                                        </div>
                                        <div style="display: flex">
                                            <p class="font-weight-bold">発送日:&nbsp;</p>
                                            <?php echo $purchase->shipment_date;?>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <button class="btn btn-danger btn_detail">注文詳細を見る</button> 
                                </td>
                            </tr>
                    <?php $n++;}?>
                </tbody>
            </table>
            <?php echo $links; ?>
        </div>

        <div id="Not_send" class="tabcontent box2">
            <table id="table2" class="table">
                <tbody>
                    <?php
                        foreach($InboxMessage as $purchase){
                            ?>
                            <tr>
                                <td>
                                    <div>
                                        <div class="purchase_state">
                                            <?php echo $purchase->delivery_state;?>
                                        </div>
                                        <div class="purchase_line" style="display: flex">
                                            <p class="font-weight-bold">注文番号 : &nbsp;</p>
                                            <span><?php  echo $purchase->purchase_id;?></span>
                                        </div>
                                        <div style="display: flex">
                                            <p class="font-weight-bold">¥<?php echo $purchase->price;?> -&nbsp;</p>
                                            <?php echo $purchase->method;?>
                                        </div>
                                        <div style="display: flex">
                                            <p class="font-weight-bold">ユーザー識別コード : &nbsp;</p>
                                            <?php echo $purchase->customer_id;?>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <div style="display: flex;">
                                            <p style="font-weight: bold;">ガチャID : &nbsp;</p>
                                            <?php echo $purchase->gacha_id;?>
                                        </div>
                                        <div style="display: flex">
                                            <p class="font-weight-bold">ガチャ名:&nbsp;</p>
                                            <?php echo $purchase->name;?>
                                        </div>
                                        <div style="display: flex">
                                            <p class="font-weight-bold">最終ガチャ日:&nbsp;</p>
                                            <?php echo $purchase->end_date;?>
                                        </div>
                                        <div style="display: flex">
                                            <p class="font-weight-bold">発送日:&nbsp;</p>
                                            <?php echo $purchase->shipment_date;?>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <button class="btn btn-danger btn_detail">注文詳細を見る</button> 
                                </td>
                            </tr>
                    <?php }?>
                </tbody>
            </table>
            <?php echo $links; ?>
        </div>

        <div id="Done" class="tabcontent box3">
            <table id="table3" class="table">
                <tbody>
                    <?php
                        foreach($InboxMessage as $purchase){
                            ?>
                            <tr>
                                <td>
                                    <div>
                                        <div class="purchase_state">
                                            <?php echo $purchase->delivery_state;?>
                                        </div>
                                        <div class="purchase_line" style="display: flex">
                                            <p class="font-weight-bold">注文番号 : &nbsp;</p>
                                            <span><?php  echo $purchase->purchase_id;?></span>
                                        </div>
                                        <div style="display: flex">
                                            <p class="font-weight-bold">¥<?php echo $purchase->price;?> -&nbsp;</p>
                                            <?php echo $purchase->method;?>
                                        </div>
                                        <div style="display: flex">
                                            <p class="font-weight-bold">ユーザー識別コード : &nbsp;</p>
                                            <?php echo $purchase->customer_id;?>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <div style="display: flex;">
                                            <p style="font-weight: bold;">ガチャID : &nbsp;</p>
                                            <?php echo $purchase->gacha_id;?>
                                        </div>
                                        <div style="display: flex">
                                            <p class="font-weight-bold">ガチャ名:&nbsp;</p>
                                            <?php echo $purchase->name;?>
                                        </div>
                                        <div style="display: flex">
                                            <p class="font-weight-bold">最終ガチャ日:&nbsp;</p>
                                            <?php echo $purchase->end_date;?>
                                        </div>
                                        <div style="display: flex">
                                            <p class="font-weight-bold">発送日:&nbsp;</p>
                                            <?php echo $purchase->shipment_date;?>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <button class="btn btn-danger">注文詳細を見る</button> 
                                </td>
                            </tr>
                    <?php }?>
                </tbody>
            </table>
            <?php echo $links; ?>
        </div>
    </div>
</div>

<script>
    var base_url = "<?php echo base_url(); ?>";
    $(document).ready(function() {
        var tabnumber = "<?php echo $tabnumber?>";
        if (tabnumber == "1") {
            $(".All_purchase").addClass("focused");
        } else if (tabnumber == "2") {
            $(".Not_send").addClass("focused");
        } else {
            $(".Complete").addClass("focused");
        }
    })
    function moveTab(tabName,elmnt) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablink");
        document.getElementById(tabName).style.display = "block";
        var focused = document.getElementsByClassName("focused");
        var i;
        for (i = 0; i < focused.length; i++) {
            var under = focused[i];
            if (under.classList.contains('focused')) {
                under.classList.remove('focused');
            }
        }
        elmnt.classList.add("focused");
    }

    $(".All_purchase").on("click", function(){
        window.location.href='<?php echo base_url()?>Delivery/index/';
    });
    $(".Not_send").on("click", function(){
        window.location.href='<?php echo base_url()?>Delivery/not_send/';
    });
    $(".Complete").on("click", function(){
        window.location.href='<?php echo base_url()?>Delivery/complete/';
    });
    $(".btn_detail").on("click", function(){
        var id = $(this).closest("tr").find("span.purchase_id").text();
        window.location.href='<?php echo base_url()?>Purchase_detail/detailView/'+id;
    });
</script>