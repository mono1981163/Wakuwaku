<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <p>感谢您使用Waku Waku Pon。</p>
    <p>由于难以提供产品，我们决定取消以下订单信息。<br>
        不便之处，敬请见谅。
    </p>
    <p>
        [订单号]:&nbsp; <?php echo $order_number?><br>
        [订购日期]:&nbsp;<?php echo $date?><br>
        [订购日期] Alipay<br>
        [订单详情]:&nbsp; （<?php echo $name?>）<?php echo $purchase_times?>次数 <?php echo $price*$purchase_times?>元<br>
        [送货费]:&nbsp;<?php echo $fee?>元<br>
        [总费用]:&nbsp; <?php echo $amount?>元（含税）
    </p>
    <p>※该电子邮件仅用于发送，因此请勿回复。</p>
    <p>==============================</p>
    <p>WACTOR有限公司<br>
    Waku Waku Pon管理办公室<br>
    5-90东，北本市，埼玉县<br>
    电子邮件地址:&nbsp;<?php echo $email?></p>
    <p>==============================</p><br>
</body>
</html>