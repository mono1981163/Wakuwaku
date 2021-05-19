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
            <button class="tablink All_purchase" onclick="myFunction('All_purchase', this, 'all')"><span class="a-border">全ての注文</span></button>
            <button class="tablink Not_send" onclick="myFunction('Not_send', this, 'all')"><span class="a-border">未発送</span></button>
            <button class="tablink Done" onclick="myFunction('Done', this, 'all')"><span class="a-border">完了</span></button>
        </div>
        <div class="gacha-select" style="margin-top: 70px">
            <label for="">ガチャフィルター</label>
            <select name="select" id="gachaid" onchange="selectOption()">
                <!-- <option value="all">すべてのガチャ
                </option> -->
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
    var selectTab = "All_purchase";
    $(document).ready(function() {
        getData("All_purchase", "all");
    });

    function getData(tagName, selectedItems)
    {
        $.ajax({
            url: base_url + "Delivery/selectOption/",
            type: "post",
            data: {selectTabs: tagName, selectOptions: selectedItems},
            success: function(response) {
                response = JSON.parse(response);
                var gacha_id = "";
                var n = 1;
                var messages01 = `<table id="table${response.delivery_state}" class="table"><tbody>`;
                var messages02 = `<option value="all">すべてのガチャ</option>`;
                response.InboxMessage.forEach(message=>{
                    console.log(message);
                    messages01 += `<tr><td><div><div class="purchase_state">${message.delivery_state}</div>
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
                            <button class="btn btn-danger btn_detail" onclick="gachaDetail(${message.purchase_id})">注文詳細を見る</button> 
                        </td>
                    </tr>`;
                    if(gacha_id == `${message.gacha_id}`) {
                        messages02 += "";
                    } 
                    else {
                        messages02 += `<option value=${message.gacha_id}>
                            ${message.name}
                        </option>`;
                    }
                    gacha_id = `${message.gacha_id}`;
                    n++;
                });
                messages01 += `</tbody></table>${response.links}`;
                if(`${response.tabnumber}` == "1"){
                    $('#All_purchase').html(messages01);
                }
                else if(`${response.tabnumber}` == "2"){
                    $('#Not_send').html(messages01);
                }
                else {
                    $('#Done').html(messages01);
                }
                if(selectedItems == "all") {
                    $('#gachaid').html(messages02);
                }
                var tabnumber = `${response.tabnumber}`;
                if (tabnumber == "1") {
                    $(".All_purchase").addClass("focused");
                } else if (tabnumber == "2") {
                    $(".Not_send").addClass("focused");
                } else {
                    $(".Done").addClass("focused");
                }
            },
            error: function() {
                alert("server error");
            }
        });
    }

    function myFunction(tabName,elmnt,optionValue) {
        var i, tabcontent, tablinks;
        selectTab = tabName;
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
        getData(tabName, optionValue);
    }

    // $(".btn_detail").on("click", function(){
    //     alert("ok");
    //     var id = $(this).closest("tr").find("span.purchase_id").text();
    //     window.location.href='<?php echo base_url()?>Purchase_detail/detailView/'+id;
    // });
    function gachaDetail(arg) {
        console.log(arg);
        window.location.href='<?php echo base_url()?>Purchase_detail/detailView/' + arg;
    }

    function selectOption() {
        var e = document.getElementById("gachaid");
        var opt = e.options[e.selectedIndex];
        var param = opt.value;
        getData(selectTab, param);
    }   
</script>