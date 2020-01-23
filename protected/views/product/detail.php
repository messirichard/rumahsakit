<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.2.15/css/lightgallery.css"/>
<div id="content" class="shuttershock">

    <div class="container">

        <div class="row" id="detail-products">

            <div class="col-md-6 no-padding images">
                <div class="big_picture_product">
                    <img width="100%" height="auto" id="zoom_01" data-zoom-image="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(2500, 1500, '/images/product/'.$data->image , array('method' => 'resize', 'quality' => '90')) ?>" src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(585,486, '/images/product/'.$data->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" />
                    <div class="clear"></div>
                </div>

                <?php
                $gambar = PrdProductImage::model()->findAll('product_id = :product_id ORDER BY id ASC', array(':product_id'=>$data->id));
                ?>
                <div class="outers_box_thumb_product" style="margin-top:18px">
                    <ul id="light-gallery" class="gallery light-gallery" style="list-style:none;margin:0px; padding:0;">
                    <?php foreach ($gambar as $key => $value): ?>
                    <li data-src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(840,1000, '/images/product/'.$value->image , array('method' => 'resize', 'quality' => '90')) ?>" data-sub-html="Judul Product">
                        <a class="default-image" href="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(840,1000, '/images/product/'.$value->image , array('method' => 'resize', 'quality' => '90')) ?>">
                            <img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(185,150, '/images/product/'.$value->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="" class="img-responsive">
                        </a>
                    </li>
                    <?php endforeach ?>
                    </ul>
                    <!-- contoh slide di script bawah -->
                </div>

                <div class="clear"></div>

            </div>

            <div class="col-md-6">
                <?php if(Yii::app()->user->hasFlash('danger')): ?>
                    <?php $this->widget('bootstrap.widgets.TbAlert', array(
                        'alerts'=>array('danger'),
                    )); ?>
                <?php endif; ?>
            <?php
            $alert = false;
            ?>
                <?php if(Yii::app()->user->hasFlash('success')): ?>
                
                    <?php $this->widget('bootstrap.widgets.TbAlert', array(
                        'alerts'=>array('success'),
                    )); ?>
            <?php
            $alert = true;
            ?>
                <?php endif; ?>
                <div class="right_detail_products">
                    <h2 class="upp color2"><?php echo $data->description->name ?></h2>
                    <p class="color1 pricing"><?php echo Cart::money(PrdProduct::harga($data)) ?></p>
                    <?php if ($data->harga_coret > PrdProduct::harga($data)): ?>
                    <p class="color1 pricing strokes"><?php echo Cart::money($data->harga_coret) ?></p>
                    <?php elseif($data->harga > PrdProduct::harga($data)): ?>
                    <p class="color1 pricing strokes"><?php echo Cart::money($data->harga) ?></p>
                    <?php endif ?>
                    
                    <?php if($alert): ?>
                        <a href="<?php echo CHtml::normalizeUrl(array('/product/index')); ?>" class="upp btn btn-bear"><?php echo Tt::t('front', 'Lanjut Belanja') ?></a>
                        <div class="clear height-10 visible-xs"></div>
                        <a href="<?php echo CHtml::normalizeUrl(array('/cart/shop')); ?>" class="upp btn btn-bear"><?php echo Tt::t('front', 'Lanjut Ke Pembayaran') ?></a>
                        <div class="clear height-15"></div>
                    <?php else: ?>
                    <div id="toCart">

                        <form class="form-inline" action="<?php echo CHtml::normalizeUrl(array('addcart', 'lang'=>Yii::app()->language)); ?>" method="post">

                            <label class="qty-label" for="qty"><?php echo Tt::t('front', 'Quantity') ?></label>
                            <input type="hidden" name="id" value="<?php echo $data->id ?>">
                            <input type="hidden" name="lang" value="<?php echo Yii::app()->language ?>">
                            <input type="number" name="qty" maxlength="3" value="1" class="form-control qty" />

                            <input type="submit" value="add to cart" class="upp btn btn-bear" />

                        </form>

                    </div>
                    <?php endif; ?>

                    <div id="itemDetails">
                        <?php 
                        // get promo ongkir
                        $get_prm_ongkir = Promote_ongkir::promote($data->id);
                        if ($get_prm_ongkir != false) { ?>
                            <?php if ($this->languageID == 2): ?>
                                 <p class="promo_text"><img class="promote_im" src="<?php echo $this->assetBaseurl ?>free-shipping.png" alt=""> Buy this product & Get FREE Up to <?php echo $get_prm_ongkir['nilai_potongan_kg'].' Kg.'; ?> Shipping with Wahana Expedition Services.</p>
                            <?php else: ?>
                                 <p class="promo_text"><img class="promote_im" src="<?php echo $this->assetBaseurl ?>free-shipping.png" alt=""> Silahkan Beli produk ini & Dapatkan FREE Ongkos kirim hingga <?php echo $get_prm_ongkir['nilai_potongan_kg'].' Kg.'; ?> dengan Jasa Ekspedisi Wahana.</p>
                            <?php endif ?>
                        <?php } ?>
                        <h5 class="title-products upp"><?php echo Tt::t('front', 'item details') ?></h5>
                        <?php echo '<span class="isi_box">'.Tt::t('front', 'isi box') ?>:
                        &nbsp;<?php
                         $is_bx = unserialize($data->data);
                         echo $is_bx['qty_box'].' Box </span>';
                         ?>

                        <?php echo $data->description->desc ?>

                        <div class="box_social_share">
                            <h5 class="title-products upp"><?php echo Tt::t('front', 'share this') ?></h5>
                            <div class="clear"></div>
                            <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A//www.mamabear.co.id/"><img src="<?php echo $this->assetBaseurl; ?>facebook.png" /></a>
                            <a target="_blank" href="https://twitter.com/home?status=http%3A//www.mamabear.co.id/"><img src="<?php echo $this->assetBaseurl; ?>twitter.png" /></a>
                        <div class="clear"></div>
                        </div>

                    </div> <!-- #itemDetails-->
                
                    <div class="clear"></div>
                </div>

                <div class="clear"></div>
            </div>

        </div><!-- #detail-products -->

        <hr />

        <h5 class="text-center title-products upp"><?php echo Tt::t('front', 'featured products') ?></h5>

        <div id="list-products" class="container">
        <div class="row">
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
            </div>

        </div><!-- #list-products -->

    </div><!-- .container -->

    </div><!-- #content -->

<script src='<?php echo Yii::app()->baseUrl.Yii::app()->theme->baseUrl; ?>/asset/js/elevatezoom/jquery.elevatezoom.js'></script>
<script>
jQuery(document).ready(function($) {
    var s_window = $(window).width();
    if (s_window > 1025){
        $('#zoom_01').elevateZoom({
        lensSize: 130,
        zoomWindowWidth: 300,
        zoomWindowHeight: 300,
       });
    };
});
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.2.15/js/lightgallery-all.min.js"></script>
<script>
     jQuery(document).ready(function($) {
        $(".light-gallery").lightGallery({
            thumbnail:false,
            animateThumb: false,
            showThumbByDefault: false
        });
    });
</script>


