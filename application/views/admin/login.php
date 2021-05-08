<link rel="stylesheet" href="<?= base_url("assets/css/main.css");?>">
<link rel="stylesheet" href="<?php echo base_url("assets/css/manage/login.css"); ?>">
<div class="content">
    <div class="login-wrapper">
        <div class="login-logo">
            <img src="<?= base_url('assets/image/logo.png');?>" alt="">
        </div>
        <div class="login-body">
            <form action="" id="admin-login" enctype="multipart/form-data" method="post">
                <div class="form-group">
                    <label for="" class="form-label">ID</label>
                    <input type="text" name = "id" id="admin-id" placeholder="">
                </div>
                <div class="form-group">
                    <label for="" class="form-label">パスワード</label>
                    <input type="password" name = "password" id="admin-pass">
                </div>
                <button type="submit" class="button">ログイン</button>
            </form>
        </div>
    </div>
</div>
<script>
    var base_url = "<?php echo base_url();?>";
    $("#admin-login").bind("submit", function(e) {
        e.preventDefault();
        var flag = true;
        $(".error-txt").remove();
        if ($("#admin-id").val() == "") {
            $("#admin-id").after("<p class='error-txt'>IDを入力してください。</p>");
            flag = false;
        } 
        if ($("#admin-pass").val() == "") {
            $("#admin-pass").after("<p class='error-txt'>パスワードを入力してください。</p>");
            flag = false;
        }
        if (flag) {
            $.ajax({
                url: base_url + "User/Admin/login",
                type: "post",
                data: {id: $("#admin-id").val(), password: $("#admin-pass").val()},
                success: function(response) {
                    if(response) {
                        window.location.href= base_url + "Dashboard";
                    } else {
                        $("#admin-id").after("<p class='error-txt'>IDもしくはPasswordが正しくありません。</p>");
                    }
                },
                error: function() {

                }
            })
        }
    })
</script>

