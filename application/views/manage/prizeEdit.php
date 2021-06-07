<link rel="stylesheet" href="<?php echo base_url('assets/css/manage/gachaedit.css')?>">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<div class="content">
    <div class="main-content">
        <h3 class="pt-3 mb-3">賞品編集</h3>
        <div class="row justify-content-between">
            <div class="col-6">
                <img src="<?php echo base_url("upload/prize/").$prize_img?>" id="prize-output" onclick="prizeImageSet();" alt="">
                <input type="hidden" name="image" value="<?php echo $prize_img?>">
            </div>
            <div class="col-5">
                <h3 class="text-center">日本語</h3>
                <div class="form-group">
                    <label for="">賞品名</label>
                    <input type="hidden" name="prize_id" value="<?php echo $id?>">
                    <input type="text" name="prize_name" class="width100" value="<?php echo $prize_name;?>">
                </div>
                <div class="form-group">
                    <label for="">当選商品</label>
                    <input type="text" name="goods" class="width100" value="<?php echo $goods;?>">
                    <input type="file" id="prizeImage" class="prize_image_file" name="upload_image" onchange="loadPrizeImage(event);">
                </div>
                <h3 class="text-center">中国語</h3>
                <div class="form-group">
                    <label for="">奖品名称</label>
                    <input type="text" name="prize_name_cn" class="width100" value="<?php echo $prize_name_cn;?>">
                </div>
                <div class="form-group">
                    <label for="">产品</label>
                    <input type="text" name="goods_cn" class="width100" value="<?php echo $goods_cn;?>">
                </div>
                <div class="form-group button-group mt-5">
                    <input type="button" onclick = "window.location.href='<?php echo base_url('Gacha/Gacha_manage/edit_gacha/').$gacha_id?>'" name="action" class="btn btn-custom" value="ガチャ編集">
                    <input type="button" onclick = "prizeUpdate();" name="action" class="btn btn-custom" value="変更">
                </div>
            </div>
        </div>
        <div class="item-info">
            <div class="title mt-5">
                <h3 class="mt-3 mb-3">アイテム</h3>
            </div>
            <ul class="list-contain" id="sortable">
                <?php $i=0; foreach ($item_list as $row) { if($row != "") {$item = explode(",",$row); $i++; ?>
                    <li>
                        <div>
                            <div class="d-flex">
                                <div>
                                    <img src="<?php echo base_url()."upload/item/".trim($item[4],')') ?>" alt="">
                                    <input type="hidden" value="<?php echo $item[4]?>" name="photo">
                                    <input type="hidden" value="<?php echo $i?>" name="index">
                                </div>
                                <div class="mt-3">
                                    <h4>アイテム名: <?php echo trim($item[2],"(");?></h4>
                                    <!-- <h5 class="mt-3">在庫: <?php echo $item[2];?></h5> -->
                                </div>
                            </div>
                            <div class='button-group mb-4'>
                                <button class='btn btn-custom itemEditBtn'>編集</button>
                                <button class='btn btn-custom itemDelBtn'>削除</button>
                            </div>
                        </div>
                    </li>
                <?php }}?>
            </ul>
            <div>
                <input type="button" onclick="itemInput();"; class="btn btn-custom save_btn" style="width:120px" value="アイテム追加">
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('manage/modal.php');?>
<script>
    var base_url = "<?php echo base_url(); ?>";
    var prize_id = "<?php echo $id?>";
    function prizeImageSet() {
        $("#prizeImage").click();
    }
    function loadPrizeImage(event) {
        var image = document.getElementById('prize-output');
	    image.src = URL.createObjectURL(event.target.files[0]);
    }
    async function prizeUpdate() {
        $(".error-txt").remove();
        var flag = true;
        if($('input[name=prize_name]').val() == '' || $('input[name=goods]').val() == '' || $('input[name=prize_name_cn]').val() == '' || $('input[name=goods_cn]').val() == '') {
            $("#prizeImage").after('<p class="error-txt">すべての項目を入力してください。<p>');
            flag = false;
        }
        if (flag) {
            var prize_id = $("input[name=prize_id]").val();
            var prize_name = $("input[name=prize_name]").val();
            var goods = $("input[name=goods]").val();
            var prize_name_cn = $("input[name=prize_name_cn]").val();
            var goods_cn = $("input[name=goods_cn]").val();
            var url = base_url + "Gacha/Prize/update_single_prize";
            var image = $("input[name=image]").val();
            let formData = new FormData(); 
            formData.append("prize_name", prize_name);
            formData.append("goods", goods);
            formData.append("prize_name_cn", prize_name_cn);
            formData.append("goods_cn", goods_cn);
            formData.append("image",image);
            formData.append("prize_id",prize_id);
            formData.append("upload_image", prizeImage.files[0]);

            var xhr = new XMLHttpRequest();
            xhr.open('POST', url);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    console.log(xhr);
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
            }
            xhr.send(formData);
        }

    }
    function itemInput() {
        var message = 
            '<form action="" method = "post" onsubmit="event.preventDefault(); itemRegister(this);" enctype="multipart/form-data">'+
                '<div class="form-group">'+
                    '<label for="">アイテム名(日本語)</label>'+
                    '<input type="hidden" name="prize_id" value="<?php echo $id?>">'+
                    '<input type="hidden" name="prize_name" value="<?php echo $prize_name?>">'+
                    '<input type="text" name="item_name" value="ITEM A">'+
                '</div>'+
                '<div class="form-group">'+
                    '<label for="">アイテム名(中国語)</label>'+
                    '<input type="hidden" name="prize_name_cn" value="<?php echo $prize_name_cn?>">'+
                    '<input type="text" name="item_name_cn" value="ITEM A">'+
                '</div>'+

                // 
                '<div class="form-group">'+
                    '<label for="">在庫</label>'+
                    '<input type="number" name="stock" value="20">'+
                '</div>'+
                // 

                '<div class="form-group">'+
                    '<label for="">アイテム画像</label>'+
                    '<input type="file" id="itemImage" name="upload_image" value="" onchange="loadItemImage(event);">'+
                '</div>'+
                '<div class="item-photo">'+
                    '<img alt="" id="item-output" onclick="itemImageSet();">'+
                '</div>'+
                '<p class="image_limit">2MB以内、解像度1920*1080</p>'+
                '<div class="button-group">'+
                    '<input type="button" data-dismiss="modal" class="btn btn-custom" value="キャンセル">'+
                    '<input type="submit" name="action" class="btn btn-custom" value="追加">'+
                '</div>'+
            '</form>';
        launchModal( "アイテム編集", message,"");
    }
    function itemRegister(e) {
        $(".error-txt").remove();
        var file=document.getElementById("itemImage");
        var flag = true;
        if($('input[name=item_name]').val() == '' || file.files.length == 0 || $('input[name=item_name_cn]').val() == '' ) {
            $("#itemImage").after('<p class="error-txt">すべての項目を入力してください。<p>');
            flag = false;
        }
        if (flag) {
            var formData = new FormData(e);
            $.ajax({
                url: base_url + "Gacha/Prize/insert_single_item",
                type: 'POST',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (response) {
                    if(response == "success") {
                        document.getElementById("modal-trigger").click();
                        location.reload();
                    } else {
                        alert("画像の解像度は1920 * 1080で、サイズは2MB未満である必要があります。");
                    }
                },
                error: function(err) {

                }
            });
        }
    }
    $(".itemEditBtn").on("click", function () {
        var index = $(this).closest("li").find("input[name=index]").val();
        var prize_id = "<?php echo $id?>";
        $.ajax({
            url: base_url + "Gacha/Prize/get_single_item",
            type: 'post',
            data: {prize_id: prize_id, index: index},
           
            success: function (response) {
                response = JSON.parse(response);
                var message = 
                    '<form id="prizeForm" action="" method = "post" onsubmit="event.preventDefault(); itemEdit(this);" enctype="multipart/form-data">'+
                        '<div class="form-group">'+
                            '<label for="">アイテム名(日本語)</label>'+
                            '<input type="hidden" name="prize_name" value="<?php echo $prize_name?>">'+
                            '<input type="hidden" name="item_index" value="'+ index +'">'+
                            '<input type="hidden" name="image" value="'+ response[4]+'">'+
                            '<input type="text" name="item_name" value="'+response[2]+'">'+
                        '</div>'+
                        '<div class="form-group">'+
                            '<label for="">アイテム名(中国語)</label>'+
                            '<input type="hidden" name="prize_name_cn" value="<?php echo $prize_name_cn?>">'+
                            '<input type="hidden" name="item_index" value="'+ index +'">'+
                            '<input type="text" name="item_name_cn" value="'+response[3]+'">'+
                        '</div>'+
                        // 
                        '<div class="form-group">'+
                            '<label for="">在庫数</label>'+
                            '<input type="number" name="stock" value="'+response[5]+'">'+
                        '</div>'+
                        // 
                        '<div class="form-group">'+
                            '<label for="">アイテム画像</label>'+
                            '<input type="file" id="itemImage" name="upload_image" onchange="loadItemImage(event);">'+
                        '</div>'+
                        '<div class="prize-photo">'+
                            '<img src="<?php echo base_url()?>upload/item/'+ response[4] + '" alt="" id="item-output" onclick="itemImageSet();">'+
                        '</div>'+
                        '<p class="image_limit"2MB以内、解像度1920*1080</p>'+
                        '<div class="button-group">'+
                            '<input type="button" data-dismiss="modal" class="btn btn-custom" value="キャンセル">'+
                            '<input type="submit" name="action" class="btn btn-custom" value="変更">'+
                        '</div>'+
                    '</form>';
                launchModal( "アイテム編集", message,"");
            },
            error: function(err) {

            }
        });
    });
    $(".itemDelBtn").on("click", function () {
        var index = $(this).closest("li").find("input[name=index]").val();
        var photo = $(this).closest("li").find("input[name=photo]").val();
        var prize_id = "<?php echo $id?>"
        $.ajax({
            url: base_url + "Gacha/Prize/delete_single_item",
            type: 'post',
            data: {prize_id: prize_id, index: index, photo: photo},
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
    function itemEdit(e) {
        $(".error-txt").remove();
        var flag = true;
        if($('input[name=item_name]').val() == '' || $('input[name=item_name_cn]').val() == '') {
            $("#itemImage").after('<p class="error-txt">すべての項目を入力してください。<p>');
            flag = false;
        }
        if (flag) {
            var formData = new FormData(e);
            var url= base_url + "Gacha/Prize/update_single_item";
            formData.append("prize_id", "<?php echo $id?>");
            var xhr = new XMLHttpRequest();
            xhr.open('POST', url);
            // xhr.setRequestHeader('Content-Type', 'application/json');
            xhr.onload = function() {
                if (xhr.status === 200) {
                    console.log(xhr);
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
    function itemImageSet() {
        $("#itemImage").click();
    }
    function loadItemImage(event) {
        var image = document.getElementById('item-output');
	    image.src = URL.createObjectURL(event.target.files[0]);
    }
</script>