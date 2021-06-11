<link rel="stylesheet" href="<?php echo base_url("assets/css/gacha.css"); ?>">
<div class="content">
    <div class="main-content">
        <div class="page_title">
            <h6><span class="font--green link_color_green">HOME</span> > <span class="font--green link_color_green"><?php echo $gacha_name?></span> > <?php echo lang('gacha_conduct');?></h6>
        </div>
        <div class="video_inner">
            <video id="playvideo" muted autoplay preload playsinline>
                <source src="<?php echo base_url('assets/play.mp4')?>" type="video/mp4">
            </video>
        </div>
        <div>
            <h6></h6>
        </div>
        <form id="playForm" action="<?php echo base_url('Gacha/Gachaplay/play')?>" method="get" enctype="multipart/form-data">
                <input type="hidden" name="play" value="<?php echo $gacha_id?>">
                <input type="hidden" name="is_play" value="ok">
            </form>
        <div class="button-group">
            <button class="button" onclick="document.getElementById('playForm').submit();"><?php echo lang('skip_video');?></button>
        </div>
    </div>
</div>
<script>
    var vid = document.getElementById("playvideo");
    var base_url = "<?php echo base_url();?>"
    vid.onended = function() {
        document.getElementById('playForm').submit();
    };
</script>