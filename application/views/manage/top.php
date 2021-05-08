<link rel="stylesheet" href="<?= base_url("assets/css/manage/topimage.css");?>">
<div class="content">
    <div class="main-content">
        <!-- <div class="manage-link">
            <a href="<?php echo base_url('Top_manage');?>"><button type="button" class="btn_menu">トップ編集</button></a>
            <a href="<?php echo base_url('Gacha/gacha_manage');?>"><button class="btn_menu">ガチャ管理</button></a>
            <a href="<?php echo base_url('Delivery');?>"><button type="button" class="btn_menu">配送管理</button></a>
        </div> -->
        <div class="slide-setting">
            <h3 class="mb-3">PCスライドショーの画像の設定</h3>
            <div class="slide_show">
                <div class="preview-image">
                    <!-- <form id="imageForm" action="" method="POST" onsubmit="event.preventDefault(); ajaxImage(this);" enctype="multipart/form-data"> -->
                        <div class="preview-image-region">
                            <img src="" id="preview" alt="">
                        </div>
                        <div class="image-number pc_image">
                            <input id="imageId" type="hidden" max="3" name="id">
                            <input id="fileupload" type="file" name="upload_image" class="image-input pc_image">
                        </div>
                        <p class="image_limit">縦横比16:9、xxMB以内、解像度1920*1080</p>
                        <button type="button" class="btn btn-custom d-block" onclick="uploadFile()">変更</button>
                    <!-- </form> -->
                </div>
                <div class="slide-image">
                    <div class="img-container">
                        <?php foreach($list as $row) {?>
                        <div class="topimage">
                            <div class="image-region">
                                <img id="<?php echo $row['image_id']?>" class="output pc_image" src="<?php echo base_url('upload/topimage/').$row['image'];?>" alt=""> 
                                <p class="d-none"><?php echo $row['image_id']?></p>               
                            </div>
                        </div>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
        <div class="slide-setting">
            <h3 class="mb-3">SPスライドショーの画像の設定</h3>
            <div class="slide_show">
                <div class="preview-image">
                    <!-- <form id="imageForm" action="" method="POST" onsubmit="event.preventDefault(); ajaxImage(this);" enctype="multipart/form-data"> -->
                        <div class="preview-image-region sp_region">
                            <img src="" id="preview_sp" alt="">
                        </div>
                        <div class="image-number sp_image">
                            <input id="imageId_sp" type="hidden" max="3" name="id">
                            <input id="fileupload_sp" type="file" name="upload_image" class="image-input sp_image">
                        </div>
                        <p>写真は1920*1080、2MB以下に制限します。</p>
                        <button type="button" class="btn btn-custom d-block" onclick="uploadFile_sp()">変更</button>
                    <!-- </form> -->
                </div>
                <div class="slide-image">
                    <div class="img-container">
                        <?php foreach($list as $row) {?>
                        <div class="topimage">
                            <div class="image-region">
                                <img id="<?php echo $row['image_id']?>" class="output sp_image" src="<?php echo base_url('upload/topimage/').$row['image_sp'];?>" alt=""> 
                                <p class="d-none"><?php echo $row['image_id']?></p>               
                            </div>
                        </div>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
        <div class="vogue_gacha_list mt-5">
            <h3 class="mb-3">人気ガチャ設定</h3>
            <ul class="latestgacha">
                <?php foreach($latest as $row) {?>
                    <li class="gacha-item">
                        <div class="content-container">
                            <h5><?php echo $row['name']?></h5>
                            <img id="vogue-image<?php echo $row['gacha_id']?>" src="<?php echo base_url("upload/gacha/").$row['image']?>" alt="">
                            <div class="gachalist">
                                <label for="">ガチャリスト</label>
                                <select name="vogue-gacha" id="vogue<?php echo $row['gacha_id']?>" class="vogue-select">
                                    <?php foreach($gachalist as $gacha) { if (!$gacha['vogue_status'] && $gacha['status']!='発売終了') { ?>
                                        <option id="<?php echo $gacha['image']?>" value="<?php echo $gacha['name']?>"><?php echo $gacha['name']?></option>
                                    <?php }}?>
                                </select>
                                <!-- <input type="date" name="end_date" value="<?php echo $row['end_date']?>"> -->
                                <input type="hidden" name="gacha_id" value="<?php echo $row['gacha_id']?>">
                            </div>
                            <input type="button" class="mt-3 btn btn-custom d-block changeVogue" value="変更">
                        </div>
                    </li>
                <?php }?>
            </ul>
        </div>
    </div>
</div>
<?php $this->load->view('template/modal.php');?>
<script>
    var base_url = "<?php echo base_url();?>";
    $(".output.pc_image").on("click", function () {
        $(".image-number.pc_image input[type=file]").click();
        var id = $(this).closest(".image-region").find("p").text();
        $(".image-number.pc_image input[name=id]").val(id);
    });
    $(".output.sp_image").on("click", function () {
        $(".image-number.sp_image input[type=file]").click();
        var id = $(this).closest(".image-region").find("p").text();
        $(".image-number.sp_image input[name=id]").val(id);
    });
    $(".image-input.pc_image").on("change", function () {
        var id = $(".image-number.pc_image input[name=id]").val();
        var image = document.getElementById("preview");
	    image.src = URL.createObjectURL(event.target.files[0]);
    });
    $(".image-input.sp_image").on("change", function () {
        var id = $(".image-number.sp_image input[name=id]").val();
        var image = document.getElementById("preview_sp");
	    image.src = URL.createObjectURL(event.target.files[0]);
    });

    async function uploadFile() {
        try {
            var id = document.getElementById("imageId").value;
            var url = base_url + "Top_manage/slide_image_setting_pc";
            let formData = new FormData(); 
            formData.append("id", id)
            formData.append("upload_image", fileupload.files[0]);
            let message = await fetch(url, {
                method: "POST", 
                body: formData
            });
            if(message == "error") {
                alert("画像の解像度は1920 * 1080で、サイズは2MB未満である必要があります。");
            }
        } catch(error) {
            console.log(error.message);
        }
    }
    async function uploadFile_sp() {
        try {
            var id = document.getElementById("imageId_sp").value;
            var url = base_url + "Top_manage/slide_image_setting_sp";
            let formData = new FormData(); 
            formData.append("id", id)
            formData.append("upload_image", fileupload_sp.files[0]);
            let message = await fetch(url, {
                method: "POST", 
                body: formData
            });
            if(message == "error") {
                alert("画像の解像度は600 * 600で、サイズは3MB未満である必要があります。");
            }
        } catch(error) {
            console.log(error.message);
        }
    }

    $(".changeVogue").on("click", function () {
        var exist_id = $(this).closest(".content-container").find("input[name=gacha_id]").val();
        var select = document.getElementById('vogue'+exist_id);
        var options = select.options;
        var change_image = options[options.selectedIndex].id;

        $.ajax({
            url: base_url + "Gacha/Gacha_manage/change_vogue_gacha",
            type: "post",
            data: {id: exist_id, image: change_image},
            success: function(response) {
                location.reload();
            },
            error: function(err) {

            }
        })
    })
    $(".vogue-select").on("change", function () {
        var id = $(this).closest(".gachalist").find("input[name=gacha_id]").val();
        var select = document.getElementById('vogue'+id);
        var options = select.options;
        var change_image = options[options.selectedIndex].id;
        document.getElementById('vogue-image'+id).src = base_url + "upload/gacha/" + change_image;
    })
</script>