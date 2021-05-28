<!DOCTYPE html>
<html lang="cn">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <p>【本文】</p>
    <p>购买者</p>
    <p>感谢您使用Waku Waku Pon。<br>
    将通知您的购买已经从下面的内容完成。</p>

    <p>[购买信息]<br>
    [订单号]&nbsp;<?php echo $order_number?><br>
    [订购日期]&nbsp;<?php echo $date?><br>
    [付款方法]&nbsp;Alipay<br>
    [订单详情]&nbsp; (<?php echo $name?>）<?php echo $purchase_times?>次数 <?php echo $purchase_times*$price?>元<br>
    [送货费]&nbsp;<?php echo $amount-$purchase_times*$price?>元<br>
    [总费用]&nbsp;<?php echo $amount?>元（含税）</p>
    <p>※该电子邮件仅用于发送，因此请勿回复。</p>
    <p>==============================</p>
    <p>WACTOR有限公司<br>
    Waku Waku Pon管理办公室<br>
    5-90东，北本市，埼玉县<br>
    电子邮件地址:&nbsp;<?php echo $email?></p>
    <p>==============================</p><br>
</body>
</html>