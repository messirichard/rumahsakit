<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,600,600i,700" rel="stylesheet">
 <!-- shortcodes -->
 <link rel="stylesheet" type="text/css" href="<?php echo $this->assetBaseurl ?>../pct/css/shortcodes.css" />
 <!-- owl-carousel -->
 <link href="<?php echo $this->assetBaseurl ?>../pct/css/owl.carousel.css" rel="stylesheet" type="text/css" />
 <link href="<?php echo $this->assetBaseurl ?>../pct/css/owl.theme.css" rel="stylesheet" type="text/css" />
 <!-- base -->
 <link href="<?php echo $this->assetBaseurl ?>../pct/css/base.css" rel="stylesheet" type="text/css"/>
 <!-- Responsive -->
 <link href="<?php echo $this->assetBaseurl ?>../pct/css/responsive.css" rel="stylesheet">

<div class="outers-middle-contents back-white">
    <div class="prelatife container">
        <div class="clear height-20"></div>     
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="<?php echo CHtml::normalizeUrl(array('/home/index')); ?>">Home</a></li>
              <li class="active">Blog</li>
            </ol>
            <div class="clear"></div>
        </div>

        <div class="clear height-50"></div>

        <div class="outer-insides-pages">
            <div class="content-text top-insides-contentfoll">
                
                <h2 class="titlepages mb-0 text-center">Blog</h2>

<section class="blog-post blog-post-single">
            <div class="container">
               <div class="row row-eq-height default">
                  <div class="col-md-9 sm-mb-5">
                     <div class="post">
                        <div class="post-image clearfix"><img class="img-responsive" src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(900, 542, '/images/blog/'. $detail->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="" /></div>
                        <div class="post-details">
                           <div class="post-title">
                              <h3 class="title"><a href="#"><?php echo $detail->description->title; ?></a></h3>
                           </div>
                           <div class="post-meta"> <a href="#"><i class="fa fa-calendar"></i> <?php echo date('j M Y', strtotime($detail->date_input)) ?></a> <a href="#"><i class="fa fa-tag"></i> <?php echo ucwords(Blog::model()->getCategoryName($detail->topik_id, $this->languageID)); ?></a> </div>
                           <div class="post-content mt-2">
                              <?php echo $detail->description->content; ?>
                           </div>
                        </div>
                     </div>

                     <hr>
                     <div class="related-pro mt-4">
                        <h4>Other Blog</h4>
                        <div class="owl-carousel blog-carousel" data-items="3" data-md-items="3" data-sm-items="2" data-xs-items="2" data-space="10">
                            <?php foreach ($blogs->getData() as $key => $value){ ?>
                           <div class="item">
                              <div class="post">
                                 <div class="post-image clearfix">
                                    <img class="img-responsive" src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(308, 183, '/images/blog/'. $value->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="<?php echo $value->description->title ?>" />
                                 </div>
                                 <div class="post-details">
                                    <div class="post-title">
                                      <h5 class="title"><a href="<?php echo CHtml::normalizeUrl(array('/blog/detail', 'id'=> $value->id)).'/'.Slug::Create(strtolower($value->description->title)); ?>"><?php echo $value->description->title ?></a></h5>
                                    </div>
                                    <div class="post-content"> </div>
                                    <div class="post-meta">
                                        <div class="row default">
                                            <div class="col-xs-6">
                                                <a href="#"><i class="fa fa-calendar"></i> &nbsp;<?php echo date('j M Y', strtotime($value->date_input)) ?></a> 
                                            </div>
                                            <div class="col-xs-6">
                                                <a href="#" class="categorys_one_line"><i class="fa fa-tag"></i> <?php echo ucwords(Blog::model()->getCategoryName($value->topik_id, $this->languageID)); ?></a> 
                                            </div>
                                        </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                            <?php } ?>

                        </div>
                     </div>

                  </div>
                  <div class="col-md-3">

                        <?php 
                        $criteria = new CDbCriteria;
                        $criteria->with = array('description');
                        $criteria->addCondition('description.language_id = :language_id');
                        $criteria->params[':language_id'] = $this->languageID;
                        $kategori = PrdCategory::model()->findAll($criteria);
                        ?>
                        <div class="sidebar-widget widget-categories">
                          <h5 class="widget-title solid-weight">Categories</h5>
                          <ul class="widget-ul list-unstyled list-hand">
                            <li>
                              <a href="<?php echo CHtml::normalizeUrl(array('/blog/index')); ?>">All</a>
                             </li>
                            <?php foreach ($kategori as $ke_cat => $valu_category): ?>
                             <li class="<?php echo ($detail->topik_id == $valu_category->id)? 'active':''; ?>">
                              <a href="<?php echo CHtml::normalizeUrl(array('/blog/index', 'category'=> $valu_category->id)); ?>"><?php echo ucwords($valu_category->description->name); ?>
                                </a>
                             </li>
                            <?php endforeach ?>
                          </ul>
                       </div>

                       <meta property="og:type" content="article" /> 
                        <meta property="og:url" content="<?php echo Yii::app()->request->hostInfo . CHtml::normalizeUrl(array('/blog/detail', 'id'=> $detail->id)).'/'.Slug::Create(strtolower($detail->description->title)); ?>" /> 
                        <meta property="og:site_name" content="suryasukses.com" />
                        <meta property="og:title" content="<?php echo $detail->description->title ?>" /> 
                        <meta property="og:image" content="<?php echo $baseUrl_full.ImageHelper::thumb(600, 400, '/images/blog/'. $detail->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" /> 
                        <meta property="og:description" content="<?php echo substr(strip_tags(str_replace('"', "'", $detail->description->content)), 0, 150) ?>" />

                        <meta name="msapplication-config" content="none"/>

                        <meta name="twitter:title" content="<?php echo str_replace('"', "'", $detail->description->title) ?>">
                        <meta name="twitter:image" content="<?php echo Yii::app()->request->hostInfo.Yii::app()->baseUrl.ImageHelper::thumb(600,400, '/images/blog/'.$detail->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>">
                        <meta name="twitter:card" content="summary">
                        <meta name="twitter:site" content="@suryasukses.com">
                        <meta name="twitter:creator" content="@suryasukses.com">
                        <meta name="twitter:description" content="<?php echo substr(strip_tags(str_replace('"', "'", $detail->description->content)), 0, 150) ?>">
                        <meta name="twitter:domain" content="suryasukses.com">

                        <div class="sidebar-widget social-widget">
                           <h5 class="widget-title solid-weight">Share</h5>
                           <ul class="list-unstyled">
                              <li><a class="fb" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(Yii::app()->request->hostInfo.Yii::app()->request->url) ?>"><i class="icon-social-facebook icons"></i> Facebook</a></li>
                              <li><a class="tw" href="https://twitter.com/home?status=<?php echo urlencode(Yii::app()->request->hostInfo.Yii::app()->request->url) ?>"><i class="icon-social-twitter icons"></i> Twitter</a></li>
                              <li><a class="gp" href="https://plus.google.com/share?url=<?php echo urlencode(Yii::app()->request->hostInfo.Yii::app()->request->url) ?>"><i class="icon-social-google-plus icons"></i> Google Plus</a></li>
                           </ul>
                        </div>

                     </div>
                  </div>
               </div>
            </div>
         </section>
                
                
            </div>
            <!-- End content -->

        <div class="clear"></div>
    </div>
</div>

<script type="text/javascript" src="<?php echo $this->assetBaseurl ?>../pct/js/jquery.min.js"></script>
<script>
jQuery.noConflict();
</script>
<!-- owl-carousel -->
<script type="text/javascript" src="<?php echo $this->assetBaseurl ?>../pct/js/owl-carousel/owl.carousel.min.js"></script>

 <!-- isotope -->
<script src="<?php echo $this->assetBaseurl ?>../pct/js/isotope/isotope.pkgd.min.js"></script>
<script src="<?php echo $this->assetBaseurl ?>../pct/js/isotope/imagesLoaded.js"></script>

<!-- custom -->
<script type="text/javascript" src="<?php echo $this->assetBaseurl ?>../pct/js/custom.js"></script>
<style type="text/css">
    section{
        padding-top: 75px;
    }
</style>

<?php /*
<div id="content" class="shuttershock">

    <div class="container">
        <div class="clear height-0"></div>
        <div class="back-to-article"><a href="<?php echo CHtml::normalizeUrl(array('index', 'lang'=>Yii::app()->language)); ?>">< <?php echo Tt::t('front', 'Back') ?></a></div>
        <div class="clear height-10"></div>
        <div class="row out_block_detailBlog" id="detail-products">
            <div class="col-md-6 no-padding images">
                <img width="100%" height="auto" src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(585,1000, '/images/blog/'.$detail->image , array('method' => 'resize', 'quality' => '90')) ?>" />
            </div>

            <div class="col-md-6">

                <h2 class="upp color2"><?php echo $detail->description->title ?></h2>
                <div class="clear clearfix" style="height:30px;"></div>
                <div id="itemDetails">
                    <?php echo $detail->description->content ?>
                    
                    <div class="blogs_social_icon">
                        <h5 class="title-products upp"><?php echo Tt::t('front', 'share this') ?></h5>
                        <a href="#"><img src="<?php echo $this->assetBaseurl; ?>facebook.png" /></a>
                        <a href="#"><img src="<?php echo $this->assetBaseurl; ?>twitter.png" /></a>
                        
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div> <!-- #itemDetails-->
                    
            </div>

        </div><!-- #detail-products -->
            <div class="clear height-25"></div>

        <hr />

        <h5 class="text-center title-products upp"><?php echo Tt::t('front', 'Other Articles') ?></h5>

        <div id="list-products" class="container listings_blog_detailOthers">
            <div class="row">
            <?php foreach ($blog->getData() as $key => $value): ?>
                <div class="col-md-3 products">
                    <a href="<?php echo CHtml::normalizeUrl(array('detail', 'id'=>$value->id, 'lang'=>Yii::app()->language)); ?>"><img class="img-responsive" height="auto" src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(283,202, '/images/blog/'.$value->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" /></a>
                    <p><a href="<?php echo CHtml::normalizeUrl(array('detail', 'id'=>$value->id, 'lang'=>Yii::app()->language)); ?>"><?php echo $value->description->title ?></a></p>
                </div>
            <?php endforeach ?>
            </div>

        </div><!-- #list-products -->

    </div><!-- .container -->

    </div><!-- #content -->
    */ ?>