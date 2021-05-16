<link rel="stylesheet" href="<?php echo base_url('assets/css/manage/gachaedit.css')?>">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<div class="content">
    <div class="main-content">
        <!-- <div class="manage-link">
            <a href="<?php echo base_url('Top_manage');?>"><button type="button" class="btn_menu">トップ編集</button></a>
            <a href="<?php echo base_url('Gacha/gacha_manage');?>"><button class="btn_menu">ガチャ管理</button></a>
            <a href="<?php echo base_url('Delivery');?>"><button type="button" class="btn_menu">配送管理</button></a>
        </div> -->
        <h3 class="mb-3">ガチャ編集</h3>
        <div class="gacha-image">
            <div class="pc_image">
                <div class="image-region">
                    <img id="output" onclick="gachaImageSet()" src="<?php echo base_url()."upload/gacha/".$gacha_ja['image']?>">
                </div>
                <p class="image_limit">縦横比16:9、xxMB以内、解像度1920*1080</p>
                <input type="file" id="fileupload" onchange="loadGachaImage(event);" name="upload_image">
            </div>
            <div class="sp_image">
                <div class="image-region_sp">
                    <img id="output_sp" onclick="gachaImageSet_sp()" src="<?php echo base_url()."upload/gacha/".$gacha_ja['image_sp']?>">
                </div>
                <p class="image_limit">縦横比1:1、xxMB以内、解像度1920*1080</p>
                <input type="file" id="fileupload_sp" onchange="loadGachaImage_sp(event);" name="upload_image_sp">
            </div>
        </div>
        <div class="title mb-3">
            <h3>ガチャ情報</h3>
        </div>
        <div class="gacha-info">
            <div class="gacha_info_lang">
                <h4>ガチャ日本語設定</h4>
                <div class="form-box">
                    <div class="item-title">
                        <div class="need">ガチャ名前</div>
                    </div>
                    <div class="item-input">
                        <input type="hidden" name="gacha_id" value="<?php echo $gacha_ja['gacha_id']?>">
                        <input type="hidden" name="image" value="<?php echo $gacha_ja['image']?>">
                        <input type="hidden" name="image_sp" value="<?php echo $gacha_ja['image_sp']?>">
                        <input type="text" name="name" value="<?php echo $gacha_ja['name']?>">
                    </div>
                </div>
                <div class="form-box">
                    <div class="item-title">
                        <div class="need">価格(円)</div>
                    </div>
                    <div class="item-input">
                        <input type="number" name="price" value="<?php echo $gacha_ja['price']?>">
                    </div>
                </div>
                <div class="form-box">
                    <div class="item-title">
                        <div class="need">販売開始</div>
                    </div>
                    <div class="item-input">
                        <input type="date" name="start_date" value="<?php echo $gacha_ja['start_date']?>">
                    </div>
                </div>
                <div class="form-box">
                    <div class="item-title">
                        <div class="need">販売締め切り</div>
                    </div>
                    <div class="item-input">
                        <input type="date" name="end_date" value="<?php echo $gacha_ja['end_date']?>">
                    </div>
                </div>
                <div class="form-box">
                    <div class="item-title">
                        <div class="need">配送料金(円)</div>
                    </div>
                    <div class="item-input">
                        <input type="number" name="fee" value="<?php echo $gacha_ja['shipping_fee']?>">
                    </div>
                </div>
                <div class="form-box">
                    <div class="item-title">
                        <div class="need">配送時間</div>
                    </div>
                    <div class="item-input">
                        <input type="text" name="delivery_time" value="<?php echo $gacha_ja['estimated_delivery_time']?>">
                    </div>
                </div>
                <div class="form-box">
                    <div class="item-title">
                        <div class="need">備考</div>
                    </div>
                    <div class="item-input">
                        <input type="text" name="remarks" value="<?php echo $gacha_ja['remarks']?>">
                    </div>
                </div>
                <div class="form-box"></div>
            </div>
            <div class="gacha_info_lang">
                <h4>ガチャ中国語設定</h4>
                <div class="form-box">
                    <div class="item-title">
                        <div class="need">ガチャ名前</div>
                    </div>
                    <div class="item-input">
                        <input type="text" name="name_cn" value="<?php echo $gacha_cn['name']?>">
                    </div>
                </div>
                <div class="form-box">
                    <div class="item-title">
                        <div class="need">価格(元)</div>
                    </div>
                    <div class="item-input">
                        <input type="number" name="price_cn" value="<?php echo $gacha_cn['price']?>">
                    </div>
                </div>
                <div class="form-box">
                    <div class="item-title">
                        <div class="need">販売開始</div>
                    </div>
                    <div class="item-input">
                        <input type="date" name="start_date_cn" value="<?php echo $gacha_cn['start_date']?>">
                    </div>
                </div>
                <div class="form-box">
                    <div class="item-title">
                        <div class="need">販売締め切り</div>
                    </div>
                    <div class="item-input">
                        <input type="date" name="end_date_cn" value="<?php echo $gacha_cn['end_date']?>">
                    </div>
                </div>
                <div class="form-box">
                    <div class="item-title">
                        <div class="need">配送料金(元)</div>
                    </div>
                    <div class="item-input">
                        <input type="number" name="fee_cn" value="<?php echo $gacha_cn['shipping_fee']?>">
                    </div>
                </div>
                <div class="form-box">
                    <div class="item-title">
                        <div class="need">配送時間</div>
                    </div>
                    <div class="item-input">
                        <input type="text" name="delivery_time_cn" value="<?php echo $gacha_cn['estimated_delivery_time']?>">
                    </div>
                </div>
                <div class="form-box">
                    <div class="item-title">
                        <div class="need">備考</div>
                    </div>
                    <div class="item-input">
                        <input type="text" name="remarks_cn" value="<?php echo $gacha_cn['remarks']?>">
                    </div>
                </div>
                <div class="form-box"></div>
            </div>
        </div>
        <div class="d-flex">
            <input type="button" style="margin-top: unset" onclick="gachaSetting();" class="btn btn-custom save_btn" value="臨時保管">
            <input type="button" style="margin-top: unset" onclick="gachaSetting();" class="btn btn-custom save_btn" value="公開">
            <input type="button" style="margin-top: unset" onclick="deleteGacha()" class="btn btn-danger save_btn" value="ガチャ削除">
        </div>
        <div class="prize-infor">
            <div class="title mb-3">
                <h3 >賞品</h3>
            </div>
            <ul class="list-contain" id="sortable">
                <?php foreach ($prize as $row) { ?>
                    <li style="margin:10px 0 10px 0 !important" id="<?php echo $row['id']?>">
                        <div class="d-flex">
                            <div>
                                <img src="<?php echo base_url()."upload/prize/".$row['prize_img'] ?>" alt="">
                                <input type="hidden" value="<?php echo $row['prize_img']?>" name="photo">
                                <input type="hidden" value="<?php echo $row['id']?>" name="index">
                            </div>
                            <div class="mt-4">
                                <h5 class="mb-2"><?php echo $row['prize_name']?></h5>
                                <h6 class="mt-2"><?php echo $row['goods']?></h6>
                                <!-- <h5 class="mb-2"><?php echo $row['prize_name_cn']?></h5>
                                <h6 class="mt-2"><?php echo $row['goods_cn']?></h6> -->
                                <div class='button-group'>
                                    <button class='btn btn-custom' onclick = 'window.location.href ="<?php echo base_url("Gacha/Prize/edit/").$row["id"]?>"'>編集</button>
                                    <button class='btn btn-custom prizeDelBtn'>削除</button>
                                </div>
                            </div>
                        </div>
                    </li>
                <?php }?>
            </ul>
            <div>
                <input type="button" onclick="prizeInput();" class="btn btn-custom save_btn" value="賞品追加">
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('manage/modal.php');?>
<script>
    var base_url = "<?php echo base_url(); ?>";
    var gacha_id = "<?php echo $gacha_ja['gacha_id']?>";
    function gachaImageSet() {
        document.getElementById("fileupload").click();
    }
    function gachaImageSet_sp() {
        document.getElementById("fileupload_sp").click();
    }
    function loadGachaImage(event) {
        var image = document.getElementById('output');
	    image.src = URL.createObjectURL(event.target.files[0]);
    }
    function loadGachaImage_sp(event) {
        var image = document.getElementById('output_sp');
	    image.src = URL.createObjectURL(event.target.files[0]);
    }
    async function gachaSetting() {
        $(".error-txt").remove();
        var flag = true;
        if($('input[name=name]').val() == '' || $('input[name=start_date]').val() == '' || $('input[name=end_date]').val() == '' || $('input[name=fee]').val() == '' || $('input[name=delivery_time]').val() == '' || 
        $('input[name=price]').val() == '' || $('input[name=name_cn]').val() == '' || $('input[name=start_date_cn]').val() == '' || $('input[name=end_date_cn]').val() == '' || $('input[name=fee_cn]').val() == '' || 
        $('input[name=delivery_time_cn]').val() == '' || $('input[name=price_cn]').val() == '') {
            $("input[name=remarks]").after('<p class="error-txt">必須項目は必ず入力しなければします。<p>');
            flag = false;
        }
        if (flag) {
            var url = base_url + "Gacha/Gacha_manage/update_single_gacha";
            var gacha_id = $("input[name=gacha_id]").val();
            var price = $("input[name=price]").val();
            var name = $("input[name=name]").val();
            var image = $("input[name=image]").val();
            var start_date = $("input[name=start_date]").val();
            var end_date = $("input[name=end_date]").val();
            var fee = $("input[name=fee]").val();
            var delivery_time = $("input[name=delivery_time]").val();
            var remarks = $("input[name=remarks]").val();
            var price_cn = $("input[name=price_cn]").val();
            var name_cn = $("input[name=name_cn]").val();
            var image_sp = $("input[name=image_sp]").val();
            var start_date_cn = $("input[name=start_date_cn]").val();
            var end_date_cn = $("input[name=end_date_cn]").val();
            var fee_cn = $("input[name=fee_cn]").val();
            var delivery_time_cn = $("input[name=delivery_time_cn]").val();
            var remarks_cn = $("input[name=remarks_cn]").val();
            let formData = new FormData(); 
            formData.append("gacha_id", gacha_id);
            formData.append("price", price);
            formData.append("name", name);
            formData.append("start_date", start_date);
            formData.append("end_date", end_date);
            formData.append("fee", fee);
            formData.append("delivery_time", delivery_time);
            formData.append("remarks", remarks);
            formData.append("price_cn", price_cn);
            formData.append("name_cn", name_cn);
            formData.append("start_date_cn", start_date_cn);
            formData.append("end_date_cn", end_date_cn);
            formData.append("fee_cn", fee_cn);
            formData.append("delivery_time_cn", delivery_time_cn);
            formData.append("remarks_cn", remarks_cn);
            formData.append("image", image);
            formData.append("image_sp", image_sp);
            formData.append("upload_image", fileupload.files[0]);
            formData.append("upload_image_sp", fileupload_sp.files[0]);

            var xhr = new XMLHttpRequest();
            xhr.open('POST', url);
            // xhr.setRequestHeader('Content-Type', 'application/json');
            xhr.onload = function() {
                if (xhr.status === 200) {
                    if(xhr.responseText == "success") {
                        var message = '<p>操作が成功しました。<p>'+
                            '<div class="modal-footer">'+
                                '<button id="ensure" data-dismiss="modal" onclick="location.reload();"aria-label="Close" type="button" class="btn btn-custom">確&nbsp;&nbsp;認</button>'+
                            '</div>';
                        launchModal("通知",message,"");
                    } else {
                        alert("画像の解像度は1920 * 1080で、サイズは3MB未満である必要があります。");
                    }
                } else {
                    
                }
            };
            xhr.send(formData);
        }

    }
    function prizeInput() {
        var message = 
            '<form id="prizeForm" action="" method = "post" onsubmit="event.preventDefault(); prizeRegister(this);" enctype="multipart/form-data">'+
                '<div class="form-group">'+
                    '<label for="">賞品名(日本語)</label>'+
                    '<input type="hidden" name="gacha_id" value="'+gacha_id+'">'+
                    '<input type="text" name="prize_name" value="PRIZE A">'+
                '</div>'+
                '<div class="form-group">'+
                    '<label for="">当選商品(日本語)</label>'+
                    '<input type="text" name="goods" value="アクリルキーホルダー">'+
                '</div>'+
                '<div class="form-group">'+
                '<div class="form-group">'+
                    '<label for="">賞品名(中国語)</label>'+
                    '<input type="text" name="prize_name_cn" value="PRIZE A">'+
                '</div>'+
                    '<label for="">当選商品(中国語)</label>'+
                    '<input type="text" name="goods_cn" value="亚克力钥匙扣">'+
                '</div>'+
                '<div class="form-group">'+
                    '<label for="">アイテム画像</label>'+
                    '<input type="file" id="prizeImage" name="upload_image" value="" onchange="loadPrizeImage(event);">'+
                '</div>'+
                '<div class="prize-photo">'+
                    '<img src="" alt="" id="prize-output" onclick="prizeImageSet();">'+
                '</div>'+
                '<p>写真は1920*1080、2MB以下に制限します。</p>'+
                '<div class="button-group">'+
                    '<input type="button" data-dismiss="modal" class="btn btn-custom" value="キャンセル">'+
                    '<input type="submit" name="action" class="btn btn-custom" value="追加">'+
                '</div>'+
            '</form>';
        launchModal( "賞品編集", message,"");
    }
    function prizeImageSet() {
        $("#prizeImage").click();
    }
    function loadPrizeImage(event) {
        var image = document.getElementById('prize-output');
	    image.src = URL.createObjectURL(event.target.files[0]);
    }
    function prizeRegister(e) {
        $(".error-txt").remove();
        var file=document.getElementById("prizeImage");
        var flag = true;
        if($('input[name=prize_name]').val() == '' || file.files.length == 0 || $('input[name=goods]').val() == '' || $('input[name=prize_name_cn]').val() == '' || file.files.length == 0 || $('input[name=goods_cn]').val() == '') {
            $("input[name=upload_image]").after('<p class="error-txt">すべての項目を入力してください。<p>');
            flag = false;
        }
        if (flag) {
            var formData = new FormData(e);
            var url = base_url + "Gacha/Prize/insert_single_prize";
            var xhr = new XMLHttpRequest();
            xhr.open('POST', url);
            // xhr.setRequestHeader('Content-Type', 'application/json');
            xhr.onload = function() {
                if (xhr.status === 200) {
                    console.log(xhr);
                    if(xhr.responseText == "dsuccess") {
                        var message = '<p>操作が成功しました。<p>'+
                            '<div class="modal-footer">'+
                                '<button id="ensure" data-dismiss="modal" onclick="location.reload();"aria-label="Close" type="button" class="btn btn-custom">確&nbsp;&nbsp;認</button>'+
                            '</div>';
                        launchModal("通知",message,"");
                    } else {
                        alert("画像の解像度は1920 * 1080で、サイズは3MB未満である必要があります。");
                    }
                } else {
                    
                }
            };
            xhr.send(formData);
        }
    }
    $(".prizeDelBtn").on("click", function () {
        var prize_id = $(this).closest("li").find("input[name=index]").val();
        var photo = $(this).closest("li").find("input[name=photo]").val();
        $.ajax({
            url: base_url + "Gacha/Prize/delete_single_prize",
            type: 'post',
            data: {prize_id: prize_id, photo: photo},
            success: function (response) {
                var message = '<p>操作が成功しました。<p>'+
                    '<div class="modal-footer">'+
                        '<button id="ensure" data-dismiss="modal" onclick="location.reload();"aria-label="Close" type="button" class="btn btn-custom">確&nbsp;&nbsp;認</button>'+
                    '</div>';
                launchModal("通知",message,"");
            },
            error: function(err) {

            }
        });
    });
    function deleteGacha() {
        if(confirm("Are you sure you want to delete this?"))  
           {  
                $.ajax({  
                    url: base_url + "Gacha/Gacha_manage/delete_single_gacha",
                    method:"POST",  
                    data:{gacha_id:gacha_id},  
                    success:function(response)  
                    {  
                        window.location.href= base_url+"Gacha/Gacha_manage/";  
                    }  
                });  
           }  
           else  
           {  
                return false;       
           }  
    }

    $( function() {
    $( "#sortable" ).sortable(
        {
        start: function(event, ui) {
            ui.item.startPos = ui.item.index();
        },
    	stop: function(event, ui) {
        console.log("Start position: " + ui.item.startPos);
        console.log("New position: " + ui.item.index());
    	}
    });
   
    $( "#sortable" ).disableSelection();
    });
        // $("#gacha-list").on('click','.gacha_allow',function(){
    //     var id = table.row($(this).closest('tr')).data()[0];
    //     var url='<?php echo base_url()?>Gacha/Gacha_manage/allowGacha';
    //     $.ajax({
    //         url: url,
    //         type: 'post',
    //         data: {gacha_id: id},
    //         success: function(response) {
    //             table.ajax.reload();
    //         }
    //     })
    // });
</script>