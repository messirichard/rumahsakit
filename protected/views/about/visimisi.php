<section class="outer-inside-middle-content back-white">
  <div class="prelatife container">
    <div class="tops-cont-insidepage"> <div class="clear height-50"></div>
        <div class="height-50"></div>
        <div class="height-50"></div>
        <div class="height-25"></div>
        <div class="tengah insd-container text-center content-up">
          <h1 class="title-pages">ABOUT</h1> <div class="clear height-10"></div>
          <div class="lines-chld-bgrey tengah"></div> <div class="clear height-25"></div>
          <span class="bigs"><?php echo $this->setting['about_header_title'] ?></span> <div class="clear"></div>
          <p><?php echo nl2br($this->setting['about_header_subtitle']) ?></p>
          <div class="clear"></div>
        </div>
    </div>

    <div class="clear"></div>
  </div>

  <div class="back-grey mh500">
    <div class="prelatife container">
        <div class="clear height-50"></div>
        <div class="outers-cont-bottom-abouts">
          <div class="topscont text-center">
            <ul class="list-inline">
              <li><a href="<?php echo CHtml::normalizeUrl(array('/about/index')); ?>">who we are</a></li>
              <li><a href="<?php echo CHtml::normalizeUrl(array('/about/ourteam')); ?>">our team</a></li>
              <li><a href="<?php echo CHtml::normalizeUrl(array('/about/visimisi')); ?>">vision & mission</a></li>
              <li><a href="<?php echo CHtml::normalizeUrl(array('/about/workwithus')); ?>">work with us</a></li>
            </ul>
          </div>
          <div class="clear height-50"></div><div class="height-35"></div>
          <div class="middles">
            
            <div class="mw920 tengah text-center">
                <h2><?php echo $this->setting['about_visimisi_title'] ?></h2> <div class="clear height-30"></div>
                <?php echo $this->setting['about_visimisi_content'] ?>
                <div class="clear height-50"></div>
<?php
$image = AboutImage::model()->findAll();
?>
            <?php foreach ($image as $key => $value): ?>
                <div class="ill-abouts"><img src="<?php echo Yii::app()->baseUrl; ?>/images/about/<?php echo $value->image ?>" alt="" class="img-responsive"></div>
                <div class="clear height-50"></div><div class="height-5"></div>
            <?php endforeach ?>             
                <div class="shares-text">
                  <span class="inline-t">SHARE</span>&nbsp;&nbsp; / &nbsp;&nbsp;<a href="#">FACEBOOK</a>&nbsp;&nbsp; / &nbsp;&nbsp;<a href="#">GOOGLE PLUS</a>&nbsp;&nbsp; / &nbsp;&nbsp;<a href="#">TWITTER</a>
                </div>

                <div class="clear"></div>
            </div>

            <div class="clear"></div>
          </div>

          <div class="clear"></div>
        </div>
      
      <div class="clear"></div> <div class="height-50"></div><div class="height-20"></div>
    </div>
  </div>
</section>