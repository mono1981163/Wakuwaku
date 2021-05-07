<link rel="stylesheet" href="<?php echo base_url("assets/css/gacha.css"); ?>">
<div class="content">
    <div class="video-content">
        <video id="playvideo" playsinline preload poster="<?php echo base_url('upload/gacha/').$image;?>">
            <source src="" type="video/mp4">
        </video>
        <div class="video-times"><?php echo lang('remain')?>: <?php if($this->session->has_userdata('rest_times')) { echo $this->session->userdata('rest_times'); } else  echo "0";?> <?php echo lang('times')?></div>
        <div class="button-group">
            <button type="button" onclick="window.location.href='<?= base_url('Gacha/Purchase/gacha_detail/'.$gacha_id)?>'" class="button"><?php echo lang('skip')?></button>
            <button id="prizetrigger" type="button" class="button" onclick="generatePrize();"><?php echo lang('one_play')?></button>
            <button id="gained_detail" type="button" class="button" style="display:none" onclick="window.location.href='<?= base_url('Gacha/Gachaplay/win_prize_list/'.$purchase_id)?>'"><?php echo lang('win_prize_view')?></button>
        </div>
    </div>
</div>
<?php $this->load->view('template/modal.php');?>
<script>
    var base_url = "<?php echo base_url(); ?>";
    $(document).ready(function() {  
        var x=document.getElementById("gained_detail");
        var y=document.getElementById("prizetrigger");
        <?php if($this->session->userdata('rest_times') == 0){ ?>
            x.style.display="block";
            y.style.display="none";
            // var msg="<h4>終わりました。</h4>";
            // launchModal("通知",msg,"<?= base_url('Gacha/Gachaplay/win_prize_list/'.$purchase_id)?>");
        <?php }?>
    });
    function generatePrize() {
        <?php $i=0; foreach ($items as $row) { 
                if($row != "") { 
                    $item[$i] = explode(",",$row); $i++;
                }
            } 
            $result = rand(0,$i-1);
        ?>
        $.post(base_url+"Gacha/Gachaplay/gacha_replay",
        {
            gacha_id: "<?php echo $gacha_id?>",
            // purchase_times: "<?php echo $purchase_times?>",
            prize_name: "<?php echo trim($item[$result][0],'(')?>",
            item_name: "<?php echo $item[$result][1]?>",
            img_name: "<?php echo $item[$result][3]?>",
            item_count: "<?php echo $item[$result][2]?>",
            index: "<?php echo $result?>"
        });
        var message="<div class='win-prize'><div><img src='<?php echo base_url()."upload/item/".$item[$result][3] ?>'></div><div><h3><?php echo lang('name_of_goods')?></h3><h4><?php echo $item[$result][1]?></h4></div></div>";
        launchModal("<?php echo trim($item[$result][0],'(') ?>",message, "<?php echo base_url('Gacha/Gachaplay/gacha_skip_play/'.$gacha_id)?>");
        
    }
    history.pushState(null, null, location.href);
    window.onpopstate = function () {
        history.go(1);
    };
</script>
