  <section class="detail-news">
  <div class="back-grey mh500">
      <div class="picts-ill-news">
        <img src="<?php echo Yii::app()->baseUrl ?>/images/blog/<?php echo $detail->image ?>" alt="" class="img-responsive">
      </div>
      <div class="clear"></div>
      <div class="details-content prelatife container">
        <div class="row">
          <div class="col-md-4">
              <div class="left-cont-detailnews"> <div class="clear height-25"></div>
                  <span class="dates"><?php echo date('d F Y', strtotime($detail->date_input)) ?></span>
                  <div class="clear height-2"></div>
                  <p><?php echo nl2br($detail->quote) ?></p>

              </div>
          </div>
          <div class="col-md-8">
              <div class="back-white right-content-detailnews">
                <div class="insides">
                  <h2 class="title"><?php echo $detail->title ?></h2>
                  <div class="clear height-50"></div>
                  <?php echo $detail->content ?>

                  <div class="clear height-20"></div>

                  <div class="clear"></div>
                </div>
                  <div class="clear"></div>
              </div>
              <div class="clear"></div>
          </div>
        </div>
      </div>
      
      <!-- start others news -->
      <div class="clear"></div>
      <div class="prelatife container outers-cont-bottom-grey">

        <div class="clear height-35"></div><div class="height-10"></div>
        <div class="titles">OTHER STORIES</div>
        <div class="clear height-40"></div>
<?php
$blog = ViewBlog::model()->findAll('1 ORDER BY date_input DESC LIMIT 3');
?>
        <div class="listing">
          <div class="row">
            <?php foreach ($blog as $key => $value): ?>
                <div class="col-md-4 col-sm-6">
                    <div class="data-ch back-white">
                      <div class="pict">
                        <a href="<?php echo CHtml::normalizeUrl(array('/artikel/detail', 'id'=>$value->id)); ?>">
                        <img class="img-responsive" src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(407,288, '/images/blog/'.$value->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="">

                        </a>
                      </div>
                      <div class="desc h95 prelatife">
                        <span class="title"><?php echo $value->title ?></span> <div class="clear"></div>
                        <p><?php echo substr(strip_tags($value->content), 0, 70) ?></p>
                        <div class="pos-abs-rightbt"><a href="<?php echo CHtml::normalizeUrl(array('/artikel/detail', 'id'=>$value->id)); ?>"><img src="<?php echo $this->assetBaseurl; ?>back-btn-df-read.png" alt=""></a></div>
                      </div>
                    </div>
                </div>
                
            <?php endforeach ?>

          </div>
          <div class="clear"></div>
        </div>
        <!-- end listing -->
        <div class="clear"></div>
      </div>
      <!-- end others news -->


      <div class="prelatife container outers-cont-bottom-grey">
        <div class="clear height-25"></div><div class="height-3"></div>
        <div class="clear height-15"></div>
            <div class="shares-text text-center">
                  <span class="inline-t">SHARE</span>&nbsp;&nbsp; / &nbsp;&nbsp;<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(Yii::app()->request->hostInfo.Yii::app()->request->url) ?>">FACEBOOK</a>&nbsp;&nbsp; /
                  &nbsp;&nbsp;<a target="_blank" href="https://plus.google.com/share?url=<?php echo urlencode(Yii::app()->request->hostInfo.Yii::app()->request->url) ?>">GOOGLE PLUS</a>&nbsp;&nbsp; /
                  &nbsp;&nbsp;<a target="_blank" href="https://twitter.com/home?status=<?php echo urlencode(Yii::app()->request->hostInfo.Yii::app()->request->url) ?>">TWITTER</a>
                </div>

        <div class="clear height-50"></div>

        <div class="clear"></div>
      </div>
  </div>
  </section>\
