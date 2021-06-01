<link rel="stylesheet" href="<?php echo base_url('assets/css/manage/dashboard.css');?>">
<div class="content">
    <div class="main-content">
        <div class="all-sale">
            <h2 class="mt-5">売上</h2>
            <div class="record">
                <p>今週</p>
                <div>
                    <p>現状売上:<?php echo $sale_week[0]['all_amount']?></p>
                    <p>購入者数:<?php echo $sale_week[0]['users']?></p>
                    <p>賞品数:<?php echo $sale_week[0]['purchase_times']?></p>
                </div>
            </div>
            <div class="record">
                <p>今月</p>
                <div>
                    <p>現状売上:<?php echo $sale_month[0]['all_amount']?></p>
                    <p>購入者数:<?php echo $sale_month[0]['users']?></p>
                    <p>賞品数:<?php echo $sale_month[0]['purchase_times']?></p>
                </div>
            </div>
            <div class="record">
                <p>今年</p>
                <div>
                    <p>現状売上:<?php echo $sale_year[0]['all_amount']?></p>
                    <p>購入者数:<?php echo $sale_year[0]['users']?></p>
                    <p>賞品数:<?php echo $sale_year[0]['purchase_times']?></p>
                </div>
            </div>
        </div>
        <div class="sale-per-gacha">
            <h2  class="mt-5">ガチャ</h2>
            <ul class="gacha-container">
                <?php foreach($list as $row) {?>
                    <?php 
                        $start =strtotime($row['start_date']);
                        $end = strtotime($row['end_date']);
                        $current = strtotime(date('Y-m-d h:i:s'));
                        if($start < $current && $current < $end) {?>
                    <li>
                        <h4><?php echo $row['name']?></h4>
                        <div class="box">
                            <div><img src="<?php echo base_url("upload/gacha/").$row['image'];?>" alt=""></div>
                            <div class="info">
                                <p>現状売上: &nbsp;<?php echo $row['all_amount']?></p>
                                <p>購入者数: &nbsp;<?php echo $row['users']?></p>
                                <p>賞品数: &nbsp;&nbsp;<?php echo $row['purchase_times']?></p>
                            </div>
                        </div>
                        <div class="btn-container"><button class="btn btn-green editbtn float-right" onclick="window.location.href='<?php echo base_url('Gacha/Gacha_manage/edit_gacha/').$row['gacha_id']?>'">編集</button></div>
                    </li>
                    <?php }?>
                <?php }?>
            </ul>
        </div>
    </div>
    
</div>