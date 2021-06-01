<link rel="stylesheet" href="<?php echo base_url('assets/css/manage/gachaedit.css')?>">
<div class="content">
    <div class="main-content">
        <h3 class="mb-3">ガチャ編集</h3>
        <form id="gachaForm" action="" method="post" onsubmit="event.preventDefault(); ajaxForm(this);" enctype="multipart/form-data">
            <div class="gacha-image">
                <div class="pc_image">
                    <div class="image-region">
                        <img id="output" onclick="imageSet()" src="">
                    </div>
                    <p class="image_limit">縦横比16:9、3MB以内、解像度1920*1080</p>
                    <input type="file" id="image" onchange="loadImage(event);" name="upload_image">
                    <div class="d-flex">
                        <div class="btn btn-custom" onclick="imageSet();" id="image-set">PC画像設定</div>
                    </div>
                </div>
                <div class="sp_image">
                    <div class="image-region_sp">
                        <img id="output_sp" onclick="imageSet_sp()" src="">
                    </div>
                    <p class="image_limit">縦横比1:1、2MB以内</p>
                    <input type="file" id="image_sp" onchange="loadImage_sp(event);" name="upload_image_sp">
                    <div class="d-flex">
                        <div class="btn btn-custom" onclick="imageSet_sp();" id="image-set_sp">SP画像設定</div>
                    </div>
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
                            <input type="text" name="name" value="wakuwaku">
                        </div>
                    </div>
                    <div class="form-box">
                        <div class="item-title">
                            <div class="need">価格(円)</div>
                        </div>
                        <div class="item-input">
                            <input type="number" name="price"  value="550">
                        </div>
                    </div>
                    <div class="form-box">
                        <div class="item-title">
                            <div class="need">販売開始</div>
                        </div>
                        <div class="item-input">
                            <input type="datetime-local" name="start_date"  value="">
                        </div>
                    </div>
                    <div class="form-box">
                        <div class="item-title">
                            <div class="need">販売締め切り</div>
                        </div>
                        <div class="item-input">
                            <input type="datetime-local" name="end_date" value="">
                        </div>
                    </div>
                    <div class="form-box">
                        <div class="item-title">
                            <div class="need">配送料金(円)</div>
                        </div>
                        <div class="item-input">
                            <input type="number" name="fee" value="50">
                        </div>
                    </div>
                    <div class="form-box">
                        <div class="item-title">
                            <div class="need">配送時間(月以内)</div>
                        </div>
                        <div class="item-input">
                            <input type="text" name="delivery_time" value="3">
                        </div>
                    </div>
                    <div class="form-box">
                        <div class="item-title">
                            <div>備考</div>
                        </div>
                        <div class="item-input">
                            <input type="text" name="remarks">
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
                            <input type="text" name="name_cn" value="wakuwaku">
                        </div>
                    </div>
                    <div class="form-box">
                        <div class="item-title">
                            <div class="need">価格(元)</div>
                        </div>
                        <div class="item-input">
                            <input type="number" name="price_cn"  value="1000">
                        </div>
                    </div>
                    <div class="form-box">
                        <div class="item-title">
                            <div class="need">販売開始</div>
                        </div>
                        <div class="item-input">
                            <input type="datetime-local" name="start_date_cn"  value="2021-05-01">
                        </div>
                    </div>
                    <div class="form-box">
                        <div class="item-title">
                            <div class="need">販売締め切り</div>
                        </div>
                        <div class="item-input">
                            <input type="datetime-local" name="end_date_cn" value="2021-05-25">
                        </div>
                    </div>
                    <div class="form-box">
                        <div class="item-title">
                            <div class="need">配送料金(元)</div>
                        </div>
                        <div class="item-input">
                            <input type="number" name="fee_cn" value="100">
                        </div>
                    </div>
                    <div class="form-box">
                        <div class="item-title">
                            <div class="need">配送時間(月以内)</div>
                        </div>
                        <div class="item-input">
                            <input type="text" name="delivery_time_cn" value="5">
                        </div>
                    </div>
                    <div class="form-box">
                        <div class="item-title">
                            <div>備考</div>
                        </div>
                        <div class="item-input">
                            <input type="text" name="remarks_cn">
                        </div>
                    </div>
                    <div class="form-box"></div>
                </div>
            </div>
            <div>
                <input type="submit" class="btn btn-custom save_btn" value="ガチャ設定">
            </div>
        </form>
    </div>
</div>
<?php $this->load->view('manage/modal.php');?>
<script>
    var base_url = "<?php echo base_url(); ?>";
    function imageSet() {
        $("#image").click();
    }
    function imageSet_sp() {
        $("#image_sp").click();
    }
    function loadImage(event) {
        var image = document.getElementById('output');
	    image.src = URL.createObjectURL(event.target.files[0]);
    }
    function loadImage_sp(event) {
        var image = document.getElementById('output_sp');
	    image.src = URL.createObjectURL(event.target.files[0]);
    }
    function prizeImageSet() {
        $("#prizeImage").click();
    }
    function loadPrizeImage(event) {
        var image = document.getElementById('prize-output');
	    image.src = URL.createObjectURL(event.target.files[0]);
    }
    function ajaxForm(e) {
        $(".error-txt").remove();
        var flag = true;
        if($('input[name=name]').val() == '' || $('input[name=start_date]').val() == '' || $('input[name=end_date]').val() == '' || $('input[name=fee]').val() == '' || $('input[name=delivery_time]').val() == '' || 
        $('input[name=price]').val() == '' ) {
            $("input[name=remarks]").after('<p class="error-txt">必須項目は必ず入力しなければします。<p>');
            flag = false;
        }
        if ($('#image').val() == '' || $('#image_sp').val() == '' ) {
            $('input[type=file]').after('<p class="error-txt">ガチャ画像を設定する必要があります。</p>');
            flag = false;
        }
        if (flag) {
            var formData = new FormData(e);
            $.ajax({
                url: base_url + "Gacha/Gacha_manage/insert_single_gacha",
                type: 'POST',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (response) {
                    response = JSON.parse(response);
                    if(response.state=="success") {
                        var message = '<p>操作が成功しました。<p>'+
                        '<div class="modal-footer">'+
                            '<button id="ensure" data-dismiss="modal" aria-label="Close" type="button" class="btn btn-custom">確&nbsp;&nbsp;認</button>'+
                        '</div>';
                        launchModal("通知",message,"");
                        document.getElementById("ensure").addEventListener('click', function() {
                            window.location.href='<?php echo base_url()?>/Gacha/Gacha_manage/edit_gacha/'+response.result;
                        });
                    } else {
                        alert("画像の容量とサイズを確認してください。");
                    }
                    
                },
                error: function(err) {

                }
            });
        } 
    }
</script>