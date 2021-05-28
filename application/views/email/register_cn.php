<!DOCTYPE html>
<html lang="cn">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <p>【本文】</p>
    <p>ワクワクポンのご利用ありがとうございます。<br>
    ※会員登録はまだ完了しておりません。</p>
    <p>以下のURLをクリックして会員登録の完了をお願いいたします。</p>
    <a href='<?php echo base_url()."User/Registration/verify_email/".$verification_key?>'><p><?php echo base_url()."User/Registration/verify_email/".$verification_key?></p></a>
    <p>==============================</p>
    <p>WACTOR有限公司<br>
        Waku Waku Pon管理办公室<br>
        5-90东，北本市，埼玉县<br>
        电子邮件地址:&nbsp;<?php echo $email?></p>
    <p>==============================</p><br>
</body>
</html>