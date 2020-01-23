  <div class="back-grey mh500">
      <div class="prelatife container outers-cont-bottom-grey">

        <div class="clear height-50"></div><div class="height-5"></div>
        <div class="titles">IMPROVING YOUR HEALTH & <b>THEIRS’</b></div>
        <div class="clear height-30"></div>
        <div class="listing">
          <div class="row">
            <div class="col-md-8 col-sm-12">
                <div class="data-ch back-white mw-823">
                  <div class="pict">
                    <a href="<?php echo CHtml::normalizeUrl(array('/artikel/detail', 'id'=>$blog[0]->id)); ?>">
                    <img class="img-responsive" src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(823,288, '/images/blog/'.$blog[0]->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="">
                    </a>
                    </div>
                  <div class="desc h95 prelatife">
                    <span class="title"><?php echo $blog[0]->title ?></span> <div class="clear"></div>
                    <p><?php echo substr(strip_tags($blog[0]->content), 0, 150) ?></p>
                    <div class="pos-abs-rightbt"><a href="<?php echo CHtml::normalizeUrl(array('/artikel/detail', 'id'=>$blog[0]->id)); ?>"><img src="<?php echo $this->assetBaseurl; ?>back-btn-df-read.png" alt=""></a></div>
                  </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="data-ch back-white">
                  <div class="pict">
                    <a href="<?php echo CHtml::normalizeUrl(array('/artikel/detail', 'id'=>$blog[1]->id)); ?>">
                    <img class="img-responsive" src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(407,288, '/images/blog/'.$blog[1]->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="">
                  </a>
                  </div>
                  <div class="desc h95 prelatife">
                    <span class="title"><?php echo $blog[1]->title ?></span> <div class="clear"></div>
                    <p><?php echo substr(strip_tags($blog[1]->content), 0, 70) ?></p>
                    <div class="pos-abs-rightbt"><a href="<?php echo CHtml::normalizeUrl(array('/artikel/detail', 'id'=>$blog[1]->id)); ?>"><img src="<?php echo $this->assetBaseurl; ?>back-btn-df-read.png" alt=""></a></div>
                  </div>
                </div>
            </div>

         <!--  </div>
          <div class="clear height-10"></div><div class="height-4"></div>
          <div class="row"> -->
            <?php foreach ($blog as $key => $value): ?>
              <?php if ($key > 1): ?>
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
                
              <?php endif ?>
            <?php endforeach ?>
            <div class="clear"></div>
          </div>
          <div class="clear"></div>
        </div>
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