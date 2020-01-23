<section class="top-content-inside about">
    <div class="container">
        <div class="titlepage-Inside">
            <h1>e-STORE</h1>
        </div>
    </div>
    <div class="celar"></div>
</section>
<section class="middle-content">
    <div class="prelatife container">
        
        <div class="clear height-20"></div>
        <div class="height-3"></div>
        <div class="prelatife">
            <div class="box-featured-latestproduct">
                <div class="box-title">
                    <div class="titlebox-featured" alt="title-product"><?php echo $data->description->name ?></div>
                    <div class="clear"></div>
                </div>
                <div class="box-product-detailg">
                    <div class="clear height-25"></div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="box-picture-big">
                                <div class="in">
                                    <img class="img-main" style="display: inline-block;" src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(513,513, '/images/product/'.$data->image , array('method' => 'resize', 'quality' => '90')) ?>" alt="<?php echo $data->description->name ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 descriptions-product adcart">
                            <div class="padding-left-10 padding-right-20">
                                <div class="clear height-10"></div>
                                <div class="clear height-50"></div>
                                <div class="clear height-50"></div>
                                <div class="height-40"></div>
                                <p><?php echo $cart['qty'] ?> item(s) has been added to your cart:</p>
                                <h2 class="title"><?php echo $data->description->name ?></h2>
                                <?php if ($cart['option'] != ''): ?>
<?php
$option = PrdProductAttributes::model()->findByPk($cart['option']);
?>
                                Product Variations: <?php echo $option->attribute ?><br>
                                <div class="price"><?php echo Cart::money($option->price) ?> <span>GST <?php echo Cart::money($option->price / $this->setting['tax']) ?></span></div>
                                <?php else: ?>
                                <div class="price"><?php echo Cart::money($cart['price']) ?> <span>GST <?php echo Cart::money($cart['price'] / $this->setting['tax']) ?></span></div>
                                <?php endif ?>
                                <div class="clear height-25"></div>
                                <a href="<?php echo CHtml::normalizeUrl(array('/cart/shop')); ?>" class="btn back-btn-primary-blue">View Cart</a>
                                <a href="<?php echo CHtml::normalizeUrl(array('/product/index')); ?>" class="btn back-btn-primary-blue">Continue Shopping</a>
                                <a href="<?php echo CHtml::normalizeUrl(array('/cart/shop')); ?>" class="btn back-btn-primary-gold">Finish Shopping</a>
                                <div class="clear"></div>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    
                    <div class="clear height-35"></div>
                    <div class="clearfix"></div>
                </div>

                <div class="clearfix"></div>
            </div>
            <div class="back-shadow-bottom-featproduct"></div>
        <div class="clear"></div>
        </div>

        <div class="clear height-35"></div>
        <div class="clearfix"></div>
        <!-- Go to www.addthis.com/dashboard to customize your tools -->
        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-54092b87219ecbb4" async="async"></script>
        <!-- Go to www.addthis.com/dashboard to customize your tools -->
        <div class="addthis_native_toolbox"></div>
        <div class="clear height-35"></div>
    </div>
    <div class="clearfix"></div>
</section>
