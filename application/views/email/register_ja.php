<!DOCTYPE html>
<html lang="ja">
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
    <p>株式会社WACTOR<br>
    ワクワクポン運営事務局<br>
    埼玉県北本市東間5-90<br>
    メールアドレス:&nbsp;<?php echo $email?></p>
    <p>==============================</p><br>
</body>
</html>