<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <p>ガチャポンのご利用ありがとうございます。</p>
    <p>以下のURLをクリックして会員登録を完了してください。※まだ会員登録は完了しておりません。</p>
    <a href='<?php echo base_url()."User/Registration/verify_email/".$verification_key?>'><p>Email Verify</p></a>
    <p>▲本メールは送信専用のメールアドレスで送っています。 ▲決してこのメールに返信しないで下さい。</p>
    <p>株式会社ZENガチャポン運営事務局</p>
</body>
</html>