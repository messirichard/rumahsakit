<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,600,600i,700" rel="stylesheet">
 <!-- shortcodes -->
 <link rel="stylesheet" type="text/css" href="<?php echo $this->assetBaseurl ?>../pct/css/shortcodes.css" />
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

        <div class="clear height-50"></div><div class="height-25"></div>

        <div class="outer-insides-pages">
            <div class="content-text top-insides-contentfoll">
                
                <h1 class="titlepages mb-0 text-center">Blog</h1>

                <section class="masonry-main blog-post list-articles index">
                   <div class="container">
                      <div class="row row-eq-height">
                         <div class="col-md-9 sm-mb-2">
                            <div class="masonry blog-masonry" >
                               <?php foreach ($data->getData() as $key => $value){ ?>
                               <div class="masonry-item" >
                                  <div class="post">
                                     <div class="post-image clearfix">
                                        <img class="img-responsive" src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(300, 181, '/images/blog/'. $value->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="<?php echo $value->description->title ?>" /> 
                                     </div>
                                     <div class="post-details">
                                        <div class="info-meta">
                                          <span class="calendar">
                                            <i class="fa fa-calendar"></i> &nbsp;<?php echo date('j M Y', strtotime($value->date_input)) ?>
                                          </span>
                                          <span class="info-category"><?php echo ucwords(Blog::model()->getCategoryName($value->topik_id, $this->languageID)); ?></span><div class="clearfix"></div>
                                        </div>
                                        <div class="post-title">
                                           <h3 class="title"><a href="#"><?php echo $value->description->title ?></a></h3>
                                        </div>
                                        <div class="post-content">
                                           <p><?php echo substr(strip_tags($value->description->content), 0, 80).'...'; ?></p>
                                        </div>
                                        <div class="post-meta"> 
                                          <a href="<?php echo CHtml::normalizeUrl(array('/blog/detail', 'id'=> $value->id)).'/'.Slug::Create(strtolower($value->description->title)); ?>" class="btn button-view-blog">READ</a> 
                                        </div>
                                     </div>
                                  </div>
                               </div>
                               <?php } ?>

                            </div>
                            <div class="clear height-25"></div>
                            <?php $this->widget('CLinkPager', array(
                                'pages' => $data->getPagination(),
                                'selectedPageCssClass'=>'active',
                                'header' => '',
                                'htmlOptions' => array('class'=>'pagination'),
                                'prevPageLabel'     => 'Previous',
                                'nextPageLabel'     => 'Next',
                                'firstPageLabel'     => 'First',
                                'lastPageLabel'     => 'Last',
                            )); ?>
                            <div class="clear height-20"></div>
                         </div>
                         <div class="col-md-3">
                            <?php 
                            $criteria = new CDbCriteria;
                            $criteria->with = array('description');
                            $criteria->addCondition('description.language_id = :language_id');
                            $criteria->params[':language_id'] = $this->languageID;
                            $kategori = PrdCategory::model()->findAll($criteria);
                            ?>
                            <div class="post-sidebar">
                               <div class="sidebar-widget widget-categories">
                                  <h5 class="widget-title solid-weight">Categories</h5>
                                  <ul class="widget-ul list-unstyled list-hand">
                                    <li>
                                      <a href="<?php echo CHtml::normalizeUrl(array('/blog/index')); ?>">All</a>
                                     </li>
                                    <?php foreach ($kategori as $ke_cat => $valu_category): ?>
                                     <li>
                                      <a href="<?php echo CHtml::normalizeUrl(array('/blog/index', 'category'=> $valu_category->id)); ?>"><?php echo ucwords($valu_category->description->name); ?>
                                        </a>
                                     </li>
                                    <?php endforeach ?>
                                  </ul>
                               </div>
                               <div class="sidebar-widget social-widget">
                                  <h5 class="widget-title solid-weight">Follow Us</h5>
                                  <ul class="list-unstyled">
                                    <?php if ($this->setting['url_facebook']): ?>
                                     <li><a class="fb" href="<?php echo $this->setting['url_facebook'] ?>"><i class="icon-social-facebook icons"></i> Facebook</a></li>
                                    <?php endif ?>
                                    <?php if ($this->setting['url_instagram']): ?>
                                     <li><a class="fb" href="<?php echo $this->setting['url_instagram'] ?>"><i class="icon-social-instagram icons"></i> Instagram</a></li>
                                     <?php endif ?>
                                     <?php if ($this->setting['url_twitter']): ?>
                                     <li><a class="tw" href="<?php echo $this->setting['url_twitter'] ?>"><i class="icon-social-twitter icons"></i> Twitter</a></li>
                                     <?php endif ?>
                                     <?php if ($this->setting['url_linkedin']): ?>
                                     <li><a class="li" href="<?php echo $this->setting['url_linkedin'] ?>"><i class="icon-social-linkedin icons"></i> LinkedIn</a></li>
                                     <?php endif ?>
                                     <?php if ($this->setting['url_google']): ?>
                                     <li><a class="gp" href="<?php echo $this->setting['url_google'] ?>"><i class="icon-social-google-plus icons"></i> Google Plus</a></li>
                                     <?php endif ?>
                                  </ul>
                               </div>

                            </div>
                         </div>
                      </div>
                   </div>
                </section>
                <!-- End section blog post -->
                
                
            </div>
            <!-- End content -->


        <div class="clear height-50"></div>
        <div class="clear height-35"></div>

        <div class="clear"></div>
    </div>
</div>

 <!-- isotope -->
<script src="<?php echo $this->assetBaseurl ?>../pct/js/isotope/isotope.pkgd.min.js"></script>
<script src="<?php echo $this->assetBaseurl ?>../pct/js/isotope/imagesLoaded.js"></script>
<!-- custom -->
<script type="text/javascript" src="<?php echo $this->assetBaseurl ?>../pct/js/custom.js"></script>

<?php /*
<div id="content" class="shuttershock">
    <div class="container small-width">
        <?php foreach ($blog->getData() as $key => $value): ?>           
            <div class="row articles">
                <div class="col-md-5">
                    <a href="<?php echo CHtml::normalizeUrl(array('detail', 'id'=>$value->id, 'lang'=>Yii::app()->language)); ?>">
                    <img class="img-responsive" width="100%" height="auto" src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(308,220, '/images/blog/'.$value->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" />
                    </a>
                </div>

                <div class="col-md-7">
                    <span class="upp hidden"><?php echo ViewCategory::model()->find('id = :id AND language_id = :language_id', array(':id'=>$value->topik_id,':language_id'=>$this->languageID))->name ?></span>
                    <h3 class="upp color2"><a href="<?php echo CHtml::normalizeUrl(array('detail', 'id'=>$value->id, 'lang'=>Yii::app()->language)); ?>"><?php echo $value->description->title ?></a></h3>
                    <article>
                    <?php echo substr(strip_tags($value->description->content), 0, 200) ?>
                    </article>
                    <a class="btn btn-bear upp" href="<?php echo CHtml::normalizeUrl(array('detail', 'id'=>$value->id, 'lang'=>Yii::app()->language)); ?>"><?php echo Tt::t('front', 'read more') ?></a>
                </div>
            </div><!-- .row -->
        <?php endforeach ?>

        <div class="hidden">
                <?php $asd = $this->widget('CLinkPager', array(
                    'pages' => $blog->getPagination(),
                )) ?>
                </div>
        <div id="paging">
            <?php
            $page = $_GET['Blog_page'];
            if (!isset($_GET['Blog_page'])) {
                $page =  1;
            }
            ?>          
            <div class="col-md-4 text-left">
            <?php if ($page - 1 > 0): ?>
            <a class="btn btn-bear2 upp" href="<?php echo CHtml::normalizeUrl(array('index', 'Blog_page'=>$page - 1, 'lang'=>Yii::app()->language)); ?>"><?php echo Tt::t('front', 'newer') ?></a>
            <?php endif ?>
            </div>

            <div class="col-md-4"></div>

            <div class="col-md-4 text-right">
            <?php if ($asd->pageCount == ($page + 1) ): ?>
            <a class="btn btn-bear3 upp" href="<?php echo CHtml::normalizeUrl(array('index', 'Blog_page'=>$page + 1, 'lang'=>Yii::app()->language)); ?>"><?php echo Tt::t('front', 'older') ?></a>
            <?php endif ?>
            </div>
        </div>
    </div><!-- .container -->

</div><!-- #content -->
*/ ?>