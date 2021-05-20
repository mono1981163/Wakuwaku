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
            <button id="All_purchase" class="tablink All_purchase" onclick="moveTab('All_purchase', this)"><span class="a-border">全ての注文</span></button>
            <button id="Not_send" class="tablink Not_send" onclick="moveTab('Not_send', this)"><span class="a-border">未発送</span></button>
            <button id="Done" class="tablink Complete" onclick="moveTab('Done', this)"><span class="a-border">完了</span></button>
        </div>
        <div class="gacha-select">
            <label for="">ガチャフィルター</label>
            <select name="select" id="gachaid" onchange="selectGacha()">
                <option value="all">すべてのガチャ
                </option>
                <?php $n = 1;
                    $gacha_id = '';
                    foreach($InboxMessage as $purchase){
                        if($gacha_id == $purchase->gacha_id) {
                            break;
                        }
                        else {?>
                            <option value=<?php echo $purchase->gacha_id;?>>
                            ガチャid<?php echo $purchase->gacha_id;?>
                            </option>
                        <?php }
                        $gacha_id = $purchase->gacha_id;
                        $n++;
                    }
                ?>
            </select>
        </div>
        <div id="All_purchase" class="tabcontent box1">
        </div>

        <div id="Not_send" class="tabcontent box2">
        </div>

        <div id="Done" class="tabcontent box3">
        </div>
    </div>
</div>

<script>
    var base_url = "<?php echo base_url(); ?>";
    let selectTab;

    $(document).ready(function() {
        $.ajax({
                url: base_url + "Delivery/selectOption/",
                type: "post",
                data: {selectTabs: "All_purchase", selectOptions: "all"},
                success: function(response) {
                    response = JSON.parse(response);
                    var messages = "<table id='table2' class='table'><tbody>"
                    response.InboxMessage.forEach(message=>{
                        // console.log(message);
                        messages += `<tr><td><div><div class="purchase_state">${message.delivery_state}</div>
                                                <div class="purchase_line" style="display: flex">
                                                    <p class="font-weight-bold">注文番号 : &nbsp;</p>
                                                    <span>${message.purchase_id}</span>
                                                </div>
                                                <div style="display: flex">
                                                    <p class="font-weight-bold">¥${message.price} -&nbsp;</p>
                                                     ${message.method}
                                                </div>
                                                <div style="display: flex">
                                                    <p class="font-weight-bold">ユーザー識別コード : &nbsp;</p>
                                                     ${message.customer_id}
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <div style="display: flex;">
                                                    <p style="font-weight: bold;">ガチャID : &nbsp;</p>
                                                     ${message.gacha_id}
                                                </div>
                                                <div style="display: flex">
                                                    <p class="font-weight-bold">ガチャ名:&nbsp;</p>
                                                     ${message.name}
                                                </div>
                                                <div style="display: flex">
                                                    <p class="font-weight-bold">最終ガチャ日:&nbsp;</p>
                                                     ${message.end_date}
                                                </div>
                                                <div style="display: flex">
                                                    <p class="font-weight-bold">発送日:&nbsp;</p>
                                                     ${message.shipment_date}
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <button class="btn btn-danger btn_detail">注文詳細を見る</button> 
                                        </td>
                                    </tr>`
                       
                    });
                    messages += `</tbody></table>${response.links}`;
                    $('.tabcontent').html(messages);
                },
                error: function() {
                    alert("server error");
                }
        });
        var tabnumber = "<?php echo $tabnumber?>";
        if (tabnumber == "1") {
            $(".All_purchase").addClass("focused");
        } else if (tabnumber == "2") {
            $(".Not_send").addClass("focused");
        } else {
            $(".Complete").addClass("focused");
        }

    });

    function moveTab(tabName,elmnt) {
        selectTab = tabName;
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        alert(selectTab);
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

    $(".btn_detail").on("click", function(){
        var id = $(this).closest("tr").find("span.purchase_id").text();
        window.location.href='<?php echo base_url()?>Purchase_detail/detailView/'+id;
    });
    // $(document).ready(function(){
    //     var selectTab = "All_purchase";
    //     $("button").click(function() {
    //         selectTab = this.id;
    //         alert(selectTab);
    //     });
    // });

    function selectGacha(arg1, arg2) {
        var e = document.getElementById("gachaid");
        var opt = e.options[e.selectedIndex];
        var param = opt.value;
        console.log(selectTab)
        $.ajax({
                url: base_url + "Delivery/selectOption/",
                type: "post",
                data: {selectTabs: selectTab, selectOptions: param},
                success: function(response) {
                    response = JSON.parse(response);
                    var messages = "<table id='table2' class='table'><tbody>"
                    response.InboxMessage.forEach(message=>{
                        // console.log(message);
                        messages += `<tr><td><div><div class="purchase_state">${message.delivery_state}</div>
                                                <div class="purchase_line" style="display: flex">
                                                    <p class="font-weight-bold">注文番号 : &nbsp;</p>
                                                    <span>${message.purchase_id}</span>
                                                </div>
                                                <div style="display: flex">
                                                    <p class="font-weight-bold">¥${message.price} -&nbsp;</p>
                                                     ${message.method}
                                                </div>
                                                <div style="display: flex">
                                                    <p class="font-weight-bold">ユーザー識別コード : &nbsp;</p>
                                                     ${message.customer_id}
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <div style="display: flex;">
                                                    <p style="font-weight: bold;">ガチャID : &nbsp;</p>
                                                     ${message.gacha_id}
                                                </div>
                                                <div style="display: flex">
                                                    <p class="font-weight-bold">ガチャ名:&nbsp;</p>
                                                     ${message.name}
                                                </div>
                                                <div style="display: flex">
                                                    <p class="font-weight-bold">最終ガチャ日:&nbsp;</p>
                                                     ${message.end_date}
                                                </div>
                                                <div style="display: flex">
                                                    <p class="font-weight-bold">発送日:&nbsp;</p>
                                                     ${message.shipment_date}
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <button class="btn btn-danger btn_detail">注文詳細を見る</button> 
                                        </td>
                                    </tr>`
                       
                    });
                    messages += `</tbody></table>${response.links}`;
                    $('.tabcontent').html(messages);
                },
                error: function() {
                    alert("server error");
                }
        });
    }    
</script>