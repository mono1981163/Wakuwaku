<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <p>ご購入者様</p>
    <p>この度はワクワクポンのご利用いただきまして、誠にありがとうございます。<br>
    下記の内容にて、ご購入が完了いたしましたのでお知らせいたします。</p>

    <p>【ご購入情報】<br>
    [注文番号]&nbsp;<?php echo $order_number?><br>
    [注文日]&nbsp;<?php echo $date?><br>
    [お支払い方法] クレジットカード<br>
    [ご注文内容]&nbsp; (<?php echo $name?>）<?php echo $purchase_times?>回数分 <?php echo $purchase_times*$price?>円<br>
    [配送料]&nbsp;<?php echo $amount-$purchase_times*$price?>円<br>
    [合計金額]&nbsp;<?php echo $amount?>円（税込）</p>
    <p>※本メールは送信専用となっている為、決して返信しないで下さい。</p>
    <p>==============================</p>
    <p>株式会社WACTOR<br>
    ワクワクポン運営事務局<br>
    埼玉県北本市東間5-90<br>
    メールアドレス&nbsp;<?php echo $email?></p>
    <p>==============================</p><br>
</body>
</html>
