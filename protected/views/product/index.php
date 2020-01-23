<div id="content" class="shuttershock">
    <div class="container" id="products-page">
        <div class="row">
            <div class="col-md-2 din" id="left-menu">
                <span><?php echo Tt::t('front', 'Browse Categories') ?></span>
                <ul>
<?php
$category = ViewCategory::model()->findAll('language_id = :language_id AND type = :type GROUP BY id ORDER BY sort ASC', array(':language_id'=>$this->languageID, ':type'=>'çategory'));
?>
                    <li><a class="upp <?php echo $_GET['category'] == '' ? 'active' : '' ?>" href="<?php echo CHtml::normalizeUrl(array('index', 'lang'=>Yii::app()->language)); ?>"><?php echo Tt::t('front', 'All') ?></a></li>
                    <?php foreach ($category as $key => $value): ?>
                    <li><a class="upp <?php echo $_GET['category'] == $value->id ? 'active' : '' ?>" href="<?php echo CHtml::normalizeUrl(array('index', 'category'=>$value->id, 'lang'=>Yii::app()->language)); ?>"><?php echo $value->name ?></a></li>
                    <?php endforeach ?>

                </ul>
            </div>
            <div class="col-md-10">

                <div class="row">
                <div class="bear-capt neutraLight">
                    <?php echo $this->setting['home_content'] ?>
                </div>
                </div>
                <form id="form-setting-cari" action="<?php echo $this->createUrl('index', array('category'=>$_GET['category'])) ?>" method="get">
                    <div class="row product-option">
                        <div class="col-md-3">
                            <label class="color1"><?php echo Tt::t('front', 'Sort by') ?></label>
                            <select id="order" name="order" class="form-control">
                                <option value="old-new"><?php echo Tt::t('front', 'Newest First') ?></option>
                                <option value="new-old"><?php echo Tt::t('front', 'Older First') ?></option>
                                <option value="low-high"><?php echo Tt::t('front', 'Price: Low to High') ?></option>
                                <option value="high-low"><?php echo Tt::t('front', 'Price: High to Low') ?></option>
                            </select>
                        </div>

                        <div class="col-md-2">
                        <label class="color1"><?php echo Tt::t('front', 'Show per page') ?></label>
                            <select id="pagesize" name="pagesize" class="form-control">
                                <option value="15">15</option>
                                <option value="30">30</option>
                                <option value="45">45</option>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="lang" value="<?php echo Yii::app()->language ?>">
                </form>
                
                <script type="text/javascript">
                    $('#order, #pagesize').on('change', function() {
                        $('#form-setting-cari').submit();
                    });
                    $('#order').val('<?php echo $_GET['order'] ?>');
                    $('#pagesize').val('<?php echo $_GET['pagesize'] ?>');
                    
                </script>

                <div id="list-products" class="row">
            
                    <?php foreach ($product->getData() as $key => $value): ?>
                        <?php $get_prm_ongkir = Promote_ongkir::promote($value->id); ?>
                            <div class="col-md-4 col-sm-6 products">                        
                            <?php /*
                            <?php if( $key == 4 || $key == 2 || $key == 0 ) : ?>
                            <?php endif ?>
                            */ ?>
                            <?php if ($value->terbaru): ?>
                            <div class="product-label bg1 bg_newp"><p>new</p></div>
                            <?php endif ?>
                            <?php if ($value->harga_coret > PrdProduct::harga($value)): ?>
                            <?php
                            $diskon = ceil(($value->harga_coret - PrdProduct::harga($value)) / $value->harga_coret*100);
                            ?>
                            <div class="product-label bg2"><p><?php echo $diskon ?>%</p></div>
                            <?php elseif($value->harga > PrdProduct::harga($value)): ?>
                            <?php
                            $diskon = ceil(($value->harga - PrdProduct::harga($value)) / $value->harga*100);
                            ?>
                            <div class="product-label bg2"><p><?php echo $diskon ?>%</p></div>
                            <?php endif ?>
                            
                            <a class="prelatife" href="<?php echo CHtml::normalizeUrl(array('detail', 'id'=>$value->id, 'lang'=>Yii::app()->language)); ?>">
                                <img width="100%" height="auto" src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(301,250, '/images/product/'.$value->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" />
                                <?php if ($get_prm_ongkir != false): ?>
                                <span class="promote"></span>    
                                <?php endif ?>
                                <?php if ($value->stock <= 0): ?>
                                <span class="stock_empty"></span>
                                <?php endif ?>
                            </a>

                            <p><a href="<?php echo CHtml::normalizeUrl(array('detail', 'id'=>$value->id, 'lang'=>Yii::app()->language)); ?>"><?php echo $value->description->name ?></a></p>
                            <span class="d-inline price"><?php echo Cart::money(PrdProduct::harga($value)) ?></span>
                            <?php if ($value->harga_coret > PrdProduct::harga($value)): ?>
                            <span class="d-inline pcaret"><?php echo Cart::money($value->harga_coret) ?></span>
                            <?php elseif($value->harga > PrdProduct::harga($value)): ?>
                            <span class="d-inline pcaret"><?php echo Cart::money($value->harga) ?></span>
                            <?php endif ?>
                        </div>
                    <?php endforeach ?>

                </div><!-- #list-products -->

                <div class="clear height-20"></div>
                <?php $this->widget('CLinkPager', array(
                    'pages' => $product->getPagination(),
                    'header'=>'',
                    'htmlOptions'=>array('class' => 'pagination'),
                )) ?>
                <div class="clear"></div>

            </div>
        </div>
    </div><!-- .container -->

    <h5 class="text-center title-products " style="margin-top:90px"><?php echo Tt::t('front', 'FEATURED PRODUCTS') ?></h5>

        <div id="list-products" class="container">

<?php
$criteria=new CDbCriteria;
$criteria->with = array('description');
$criteria->order = 'date DESC';
$criteria->addCondition('status = "1"');
$criteria->addCondition('description.language_id = :language_id');
$criteria->params[':language_id'] = $this->languageID;
$criteria->addCondition('t.terlaris = :terlaris');
$criteria->params[':terlaris'] = 1;
$featured = new CActiveDataProvider('PrdProduct', array(
    'criteria'=>$criteria,
    'pagination'=>array(
        'pageSize'=>'3',
    ),
));

?>            
            <?php foreach ($featured->getData() as $key => $value): ?>
                <div class="col-md-4 col-sm-6 products">
                    <?php /*
                    <?php if( $key == 4 || $key == 2 || $key == 0 ) : ?>
                    <?php endif ?>
                    */ ?>
                    <?php if ($value->terbaru): ?>
                    <div class="product-label bg1 bg_newp"><p>new</p></div>
                    <?php endif ?>
                    <?php if ($value->harga_coret > PrdProduct::harga($value)): ?>
                    <?php
                    $diskon = ceil(($value->harga_coret - PrdProduct::harga($value)) / $value->harga_coret*100);
                    ?>
                    <div class="product-label bg2"><p><?php echo $diskon ?>%</p></div>
                    <?php elseif($value->harga > PrdProduct::harga($value)): ?>
                    <?php
                    $diskon = ceil(($value->harga - PrdProduct::harga($value)) / $value->harga*100);
                    ?>
                    <div class="product-label bg2"><p><?php echo $diskon ?>%</p></div>
                    <?php endif ?>
                    
                    <a href="<?php echo CHtml::normalizeUrl(array('detail', 'id'=>$value->id, 'lang'=>Yii::app()->language)); ?>"><img width="100%" height="auto" src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(301,250, '/images/product/'.$value->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" /></a>
                    <p><a href="<?php echo CHtml::normalizeUrl(array('detail', 'id'=>$value->id, 'lang'=>Yii::app()->language)); ?>"><?php echo $value->description->name ?></a></p>
                    <span class="d-inline price"><?php echo Cart::money(PrdProduct::harga($value)) ?></span>
                    <?php if ($value->harga_coret > PrdProduct::harga($value)): ?>
                    <span class="d-inline pcaret"><?php echo Cart::money($value->harga_coret) ?></span>
                    <?php elseif($value->harga > PrdProduct::harga($value)): ?>
                    <span class="d-inline pcaret"><?php echo Cart::money($value->harga) ?></span>
                    <?php endif ?>
                </div>
            <?php endforeach ?>

        </div><!-- #list-products -->

    <div class="clear"></div>

</div><!-- #content -->

<style type="text/css">
    span.stock_empty{
        position: absolute;
        top: -22px;
        left: 4px;
        background: url(<?php echo Yii::app()->baseUrl; ?>/asset/images/empty_stock.png) no-repeat;
        width: 65px;
        height: 57px;
        z-index: 1000;
        background-size: cover;
    }
</style>