<section class="back-cream-middle mh450 padding-bottom-30 border-top-insidespage">
            <div class="prelatife"> 
              <!-- start gallery -->
              <div class="outers-cont-bgallery insides-page">
                  <div class="tops back-white">
                    <div class="prelatife container wow fadeInDown">
                        <div class="clear height-25"></div>
                        <h3 class="title text-center">LATEST ARTICLES</h3> <div class="clear height-15"></div>
                        <div class="row">
                          <div class="col-md-3">
                             <span class="views-all-gallery">
                               <a href="<?php echo CHtml::normalizeUrl(array('/gallery/index')); ?>"><i class="fa fa-th-large"></i>&nbsp;&nbsp;VIEW ALL GALLERIES</a>
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
                                  <form action="<?php echo CHtml::normalizeUrl(array('gallery/index')); ?>" method="get" class="form-inline">
                                    <input type="text" class="searchmy" name="q" placeholder="search" value="<?php echo $_GET['q'] ?>">
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                  </form>
                              </div>
                          </div>
                        </div>
                          <div class="clear height-25"></div><div class="height-3"></div>
                      </div>
                  </div> 
                  <!-- end tops -->
                    
                  <div class="prelatife container">               
                      <div class="middle wow fadeInUp">
                        <?php if ($gallery->getItemCount() > 0): ?>
                        <div class="list-gallery-data">
                          <div class="row">
                            <?php foreach ($gallery->getData() as $key => $value): ?>
                            <div class="col-md-4 col-sm-6">
                                <div class="items">
                                  <div class="pict">
                                    <a href="<?php echo CHtml::normalizeUrl(array('/gallery/detail', 'id'=>$value->id)); ?>">
                                      <img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(458,300, '/images/gallery/'.$value->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="" class="img-responsive">
                                    </a>
                                  </div>
                                  <div class="clear"></div>
                                  <div class="desc">
                                    <span class="chld1"><?php echo date('d F Y', strtotime($value->date_input)) ?> <?php /* if ($value->city): ?>/ <b class="red"><?php echo strtoupper($value->city) ?></b><?php endif*/ ?></span>
                                    <div class="clear height-5"></div><div class="height-3"></div>
                                    <h5 class="title"><?php echo $value->title ?></h5>
                                    <div class="clear height-5"></div><div class="height-2"></div>
                                    <span class="chld1"><?php echo $value->sub_title ?></span> <div class="clear"></div>
                                    <a href="<?php echo CHtml::normalizeUrl(array('/gallery/detail', 'id'=>$value->id)); ?>" class="view-gallery">VIEW ARTICLES</a>
                                </div>
                                </div>
                            </div>
                            <?php endforeach ?>
                          </div>
                        </div>
                        <?php else: ?>
                        <h3>No Data Found</h3>
                        <?php endif ?>

                        <div class="clear"></div>
                        <div class="back-ptr-line-plus prelatife">
                            <div class="lines-grey-bottom"></div>
                            <div class="ts-icon-plus text-center bt-show-morehome">
                              <?php if ($_GET['ViewGallery_page'] == ''): ?>
                                <?php
                                  $_GET['ViewGallery_page'] = 1;
                                ?>
                              <?php endif ?>
                              <?php if (ceil($gallery->getTotalItemCount()/6) > $_GET['ViewGallery_page']): ?>
                              <a href="<?php echo $this->createUrl('index', array_merge($_GET, array('ViewGallery_page'=>$_GET['ViewGallery_page']+1))) ?>" class="pagination-button"><img src="<?php echo $this->assetBaseurl; ?>icon-plus-grey.png" alt=""> <br>
                                VIEW MORE GALLERIES
                              </a>
                              <?php endif ?>
                            </div>
                        </div> <div class="clear height-25"></div>

                        <div class="clear"></div>
                      </div>
                  </div>
                  <!-- end middles -->


                  <div class="clear"></div>
              </div>
              <!-- end gallery -->

                <div class="clear height-25"></div>

                <div class="clear"></div>
            </div>
        </section>
<div class="clear"></div>
<script type="text/javascript">
$(document).ready(function() {
    $(document).on('click', '.pagination-button', function() {
        $.ajax({
              method: "GET",
              url: $(this).attr('href'),
              dataType: "html"
        })
        .done(function( data ) {
            $('.bt-show-morehome').html($(data).find('.bt-show-morehome').html());
            $('.list-gallery-data > .row').append($(data).find('.list-gallery-data > .row').html());
        });
        return false;
    })
})
</script>