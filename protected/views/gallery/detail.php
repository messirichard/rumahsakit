<section class="back-cream-middle mh450 padding-bottom-30 border-top-insidespage">
            <div class="prelatife"> 
              <!-- start gallery -->
              <div class="outers-cont-bgallery insides-page">
                  <div class="tops back-white">
                    <div class="prelatife container wow fadeInUp">
                        <div class="clear height-25"></div>
                        <h3 class="title text-center">ARTICLES</h3> <div class="clear height-15"></div>
                        <div class="row">
                          <div class="col-md-3">
                             <span class="views-all-gallery">
                               <a href="<?php echo CHtml::normalizeUrl(array('/gallery/index', 'category'=>$data->topik_id)); ?>"><img src="<?php echo $this->assetBaseurl; ?>icon-chevr-left.png" alt="" class="inline-pict">BACK TO ARTICLES</a>
                             </span>
                          </div>
                          <div class="col-md-6">
                              <div class="list-menu-ctgery-gl">
                                <ul class="text-center list-inline">
                                <?php
                                $category = ViewCategory::model()->findAll('language_id = :language_id ORDER BY sort ASC', array(':language_id'=>$this->languageID));
                                ?>

                              <li <?php if ($_GET['category'] == ''): ?>class="active"<?php endif ?>><a href="<?php echo CHtml::normalizeUrl(array('/gallery/index')); ?>">ALL</a></li>
                              <?php foreach ($category as $key => $value): ?>
                              <li <?php if ($_GET['category'] == $value->id): ?>class="active"<?php endif ?>><a href="<?php echo CHtml::normalizeUrl(array('/gallery/index', 'category'=>$value->id)); ?>"><?php echo $value->name ?></a></li>
                              <?php endforeach ?>
                                </ul>
                              </div>
                          </div>
                          <div class="col-md-3">
                              <div class="bx-form-search text-right">
                                  <form action="#" method="post" class="form-inline">
                                    <input type="text" class="searchmy" name="search" placeholder="search">
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                  </form>
                              </div>
                          </div>
                        </div>
                          <div class="clear height-25"></div><div class="height-3"></div>
                      </div>
                  </div> 
                  <!-- end tops -->
                    
                  <div class="prelatife">               
                      <div class="details-page-gallery content-text"> 
                        <div class="clear height-40"></div>
                        <div class="container">
                          <div class="topss text-center wow fadeInDown">
                            <span class="dates"><?php echo date('d F Y', strtotime($data->date_input)) ?> <?php /* / <b class="red"><?php echo strtoupper($data->city) ?></b>*/ ?> </span>
                            <div class="clear height-15"></div>
                            <h1 class="title-gallery"><?php echo $data->title ?></h1> <div class="clear height-15"></div>
                            <span class="info-desc"><?php echo $data->sub_title ?></span>
                            
                            <div class="clear height-50"></div><div class="height-20"></div>
                            <div class="clear"></div>
                          </div> <div class="clear"></div>
                        </div>
                        <!-- end tops detail gallery -->
                        <div class="ill-pict-gallerybig wow fadeInUp">
                          <img src="<?php echo Yii::app()->baseUrl; ?>/images/gallery/<?php echo $data->image ?>" alt="" class="img-responsive">
                        </div> <div class="clear height-50"></div><div class="height-30"></div>
                        <div class="insides-container padding-bottom-0import">
                          <?php echo $data->content ?>
                          <div class="clear height-15"></div>
                          <p class="cls-social"><b class="red">SHARE THIS</b> / <a href="#">FACEBOOK</a> / <a href="#">PINTEREST</a> / <a href="#">GOOGLE PLUS</a> / <a href="#">TWITTER</a></p>
                          <div class="clear height-45"></div>
                          <?php /*
                          <?php
                          $gallery = GalleryImage::model()->findAll('gallery_id = :gallery_id', array(':gallery_id'=>$data->id));
                          ?>                          
                          <div class="ills-about wow fadeInUp">
                            <?php foreach ($gallery as $key => $value): ?>
                            <img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(876,20000, '/images/gallery/'.$value->image , array('method' => 'resize', 'quality' => '90')) ?>" alt="" class="img-responsive">
                            <div class="clear height-20"></div>
                            <?php endforeach ?>
                          </div> <div class="clear height-50"></div><div class="height-25"></div>
                          */ ?>
                          <div class="text-center">
                            <a href="<?php echo CHtml::normalizeUrl(array('index', 'category'=>$data->topik_id)); ?>" class="bck-tgallery">BACK TO ARTICLES</a>
                          </div>
                          <div class="clear height-35"></div>
                          <div class="clear"></div> 
                        </div>
                          
                        <div class="clear"></div>
                      </div>
                  </div>
                  <!-- end middles -->


                  <div class="clear"></div>
              </div>
              <!-- end gallery -->

                <div class="clear height-0"></div>

                <div class="clear"></div>
            </div>
        </section>
<div class="clear"></div>