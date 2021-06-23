<link rel="stylesheet" href="<?= base_url("assets/css/footer.css");?>">
<footer class="footer">
  <section>
    <h4 class="subtitle"><?php echo lang('gacha_for_sale');?></h4>
    <div class="sale-list maxwide pc">
      <?php foreach($latest as $row) {?>
        <div class="sale_card">
            <a href="<?php echo base_url("Gacha/Purchase/gacha_detail/").$row['gacha_id'];?>"><img src="<?= base_url('upload/gacha/').$row['image'];?>" alt=""></a>
            <h4><?php echo $row['name']?></h4>
            <?php 
            
            $start =strtotime($row['start_date']);
            $end = strtotime($row['end_date']);
            $current = strtotime(date('Y-m-d h:i:s'));
            
            if($current < $start) {?>
                <button class="button-green mr-2"><?php echo lang('before_sale')?></button><h5><?php echo substr($row['start_date'],0,-3)?>~<?php echo substr($row['end_date'],0,-3)?></h5>
            <?php } else if($current > $start && $current < $end) {?>
                <button class="button-green mr-2"><?php echo lang('on_sale')?></button><h5><?php echo substr($row['start_date'],0,-3)?>~<?php echo substr($row['end_date'],0,-3)?></h5>
            <?php } else {?>
                <button class="button-green mr-2"><?php echo lang('after_sale')?></button><h5><?php echo substr($row['start_date'],0,-3)?>~<?php echo substr($row['end_date'],0,-3)?></h5>
            <?php }?>
            <h4><span class="sale_price font--green"><?php echo $row['price']?></span><span class="font--green"><?php echo lang('money_unit')?></span>/<?php echo lang('times')?></h4>
        </div>
      <?php }?>   
    </div>
    <div class="sp">
      <div class="swiper-container swiper2">
          <div class="swiper-wrapper">
              <?php foreach($latest as $row) {?>
              <div class="swiper-slide">
                  <div class="card-image">
                      <div class="sale_card">
                          <a href="<?php echo base_url("Gacha/Purchase/gacha_detail/").$row['gacha_id'];?>">
                            <img src="<?= base_url('upload/gacha/').$row['image'];?>" class="gacha_image_pc" alt="">
                            <img src="<?= base_url('upload/gacha/').$row['image_sp'];?>" class="gacha_image_sp" alt="">
                          </a>
                          <h4><?php echo $row['name']?></h4>
                          <?php 

                          $start =strtotime($row['start_date']);
                          $end = strtotime($row['end_date']);
                          $current = strtotime(date('Y-m-d h:i:s'));

                          if($current < $start) {?>
                              <button class="button-green mr-2"><?php echo lang('before_sale')?></button><h5><?php echo substr($row['start_date'],0,-3)?>~<?php echo substr($row['end_date'],0,-3)?></h5>
                          <?php } else if($current > $start && $current < $end) {?>
                              <button class="button-green mr-2"><?php echo lang('on_sale')?></button><h5><?php echo substr($row['start_date'],0,-3)?>~<?php echo substr($row['end_date'],0,-3)?></h5>
                          <?php } else {?>
                              <button class="button-green mr-2"><?php echo lang('after_sale')?></button><h5><?php echo substr($row['start_date'],0,-3)?>~<?php echo substr($row['end_date'],0,-3)?></h5>
                          <?php }?>
                          <h4><span class="sale_price font--green"><?php echo $row['price']?></span><span class="font--green"><?php echo lang('money_unit')?></span>/<?php echo lang('times')?></h4>
                      </div>
                  </div>
              </div>
              <?php }?>
          </div>
          <div class="swiper-button-next">
              <img src="<?php echo base_url('assets/image/top/next.png')?>" alt="">
          </div>
          <div class="swiper-button-prev">
              <img src="<?php echo base_url('assets/image/top/prev.png')?>" alt="">
          </div>
      </div>
    </div>
  </section>
  <section>
    <div class="button-group">
      <button class="button" onclick="window.location.href='<?php echo base_url('Gacha/Gachalist');?>'"><?php echo lang('gacha_list_view');?></button>
    </div>
  </section>
  <div class="footer__bottom">
    <div class="footer__content">
      <div class="copyright pc">
          <img src="<?php echo base_url('assets/image/logo-wh.png')?>" alt="">
          <div class="small-text">powered by WACTOR</div>
          <div class="small-text">&#169 2021 WACTOR All rights reserved.</div>
      </div>
      <ul>
        <li class="pc"><a href="<?php echo base_url("Mypage/Detail")?>"><h6 class="font--white"><?php echo lang('my_page');?></h6></a></li>
        <li class="pc"><a href="<?php echo base_url("Gacha/Gachalist")?>"><h6 class="font--white"><?php echo lang('gacha_list');?></h6></a></li>
        <li class="pc"><a href="<?php echo base_url().'#userGuide'?>"><h6 class="font--white"><?php echo lang('user_guide');?></h6></a></li>
        <li><a href="<?php echo base_url("Terms")?>"><h6 class="font--white"><?php echo lang('terms_of_service');?></h6></a></li>
        <li><a href="<?php echo base_url("Privacy")?>"><h6 class="font--white"><?php echo lang('privacy_policy');?></h6></a></li>
        <li><a href="<?php echo base_url("Information")?>"><h6 class="font--white"><?php echo lang('symbol');?></h6></a></li>
        <li class="sp"><a href=""><h6 class="font--white"><?php echo lang('operation_company');?></h6></a></li>
      </ul>
    </div>
    <div class="copyright sp">
      <img src="<?php echo base_url('assets/image/logo-wh.png')?>" alt="">
      <div>
        <div class="small-text">powered by WACTOR</div>
        <div class="small-text">&#169 2021 WACTOR All rights reserved.</div>
      </div>
    </div>
  </div>
  <div class="totop" onclick="scrollToTop();">
    <img src="<?php echo base_url('assets/image/totop.png')?>" alt="">
  </div>
</footer>
<script>
    function scrollToTop() {
        // window.scrollTo({top: 0, behavior: 'smooth'});
        $('html,body').animate({ scrollTop: 0 }, 'slow');
    }
    var swiper2 = new Swiper(".swiper2", {
      slidesPerView: 1,
      spaceBetween: 0,
      centeredSlides: true,
      // freeMode: true,
      grabCursor: true,
      loop: true,
      pagination: {
          el: ".swiper-pagination",
          clickable: true
      },
      autoplay: {
          delay: 6000,
          disableOnInteraction: false
      },
      navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev"
      }
    });
</script>
</body>
<script src="<?= base_url("assets/js/bootstrap.min.js"); ?>"></script>
</html>