<?php
$session = new CHttpSession;
$session->open();
// print_r($data);
// exit;
?>
<div id="content" class="shuttershock">
    
    <h3 class="text-center"><?php echo Tt::t('front', 'Shopping Cart') ?></h3>
    <div class="left-conts-tabl-cart">
    <div class="container small-width" id="cart-page">
        <?php if (count($data)>0): ?>
        
            <div class="table-responsive">
                <!-- width="100%" -->
                <table class="table"> 
                    
                    <tr class="upp">
                        
                        <th width="40%"><?php echo Tt::t('front', 'product') ?></th>

                        <th width="10%"><?php echo Tt::t('front', 'price') ?></th>

                        <th width="15%"><?php echo Tt::t('front', 'quantity') ?></th>

                        <th width="15%" class="text-right"><?php echo Tt::t('front', 'remove') ?></th>

                        <th width="20%" class="text-right"><?php echo Tt::t('front', 'total') ?></th>

                    </tr>
                    <?php $total = 0 ?>
                    <?php $weight = 0 ?>
                    <?php foreach ($data as $key => $value): ?>
                    <?php
                            if ($value['option'] != '') {
                                $option = PrdProductAttributes::model()->find('id_str = :id_str', array(':id_str'=>$value['option']));
                                $value['price'] = $option->price;
                            }
                            $product = PrdProduct::model()->findByPk($value['id']);
                            $weightItem = $product->berat;
                    ?>

                    <tr class="list-cart">
                        
                        <td>

                            <div class="col-md-4"><img height="auto" src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(100,100, '/images/product/'.$value['image'] , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" /></div>

                            <div class="col-md-8 cart-product">

                                <p class="upp color2"><?php echo $value['name'] ?></p>

                                <span><?php echo ViewCategory::model()->find('id = :id', array(':id'=>$product->category_id))->name ?></span>
                                <div class="clear height-1"></div>
                                <span><?php $uns1_isi = unserialize($product->data); echo $uns1_isi['qty_box']. " Box"; ?></span>

                            </div>

                        </td>

                        <td class="upp"><?php echo Cart::money($value['price']) ?></td>

                        <td>
                        <form action="<?php echo CHtml::normalizeUrl(array('/product/edit')); ?>" method="post">
                        <?php if ($value['option'] != ''): ?>
                        <?php echo $option->attribute ?> <div class="clear height-5"></div>
                        <input type="hidden" value="<?php echo $value['option'] ?>" name="option">
                        <?php endif ?>
                        <?php if ($value['optional']['box'] != ''): ?>
                        With box + <?php echo Cart::money($value['optional']['box']) ?> <div class="clear height-5"></div>
                        <?php
                        $value['price'] = $value['optional']['box'] + $value['price'];
                        ?>
                        <?php endif ?>
                        
                        <input type="number" class="tranparant-back select_qty qty" name="qty"  value="<?php echo $value['qty'] ?>">
                        <button type="submit" class="btn-edit-cart">ok</button>
                        <input type="hidden" value="<?php echo $value['id'] ?>" name="id">
                        <?php if (count($value['optional']) > 0 AND $value['optional'] != ''): ?>
                            <?php foreach ($value['optional'] as $k => $v): ?>
                            <input type="hidden" value="<?php echo $v ?>" name="optional[<?php echo $k ?>]">
                            <?php endforeach ?>
                        <?php endif ?>
                        </form>
                        
                        </td>

                        <td class="text-right remove">
                        <a href="#" class="danger btn-delete-cart"><?php echo Tt::t('front', 'Remove') ?></i>
                        </td>

                        <td class="upp text-right"><?php echo Cart::money($subTotal = $value['price']*$value['qty']) ?></td>

                    </tr>
                    <?php $total = $total + $subTotal ?>
                    <?php $weight = ($weightItem*$value['qty']) + $weight ?>
                    <?php endforeach ?>

                    <tr>
                        
                        <td class="text-right color3" colspan="4"><?php echo Tt::t('front', 'Products Total') ?></td>

                        <td class="upp text-right"><?php echo Cart::money($total) ?></td>

                    </tr>

                </table>
            </div>

            <div class="row">
                
                <div class="col-md-9 color3">
                    
                    <a class="color2" href="<?php echo CHtml::normalizeUrl(array('/product/index', 'lang'=>Yii::app()->language)); ?>"><?php echo Tt::t('front', 'Continue Shopping') ?></a>

                </div>

                <div class="col-md-3 text-right"><a href="<?php echo CHtml::normalizeUrl(array('shipping', 'lang'=>Yii::app()->language)); ?>" value="Checkout" class="btn btn-bear"><?php echo Tt::t('front', 'Checkout') ?></a></div>

            </div><!-- .row -->

            <?php else: ?>
            <h3><?php echo Tt::t('front', 'Shopping cart is empty') ?></h3>
            <?php endif; ?>
    
    </div><!-- .container -->
    </div>

</div><!-- content -->
<script type="text/javascript">
    $(document).on('click', '.btn-delete-cart', function() {
        var data = $(this).parent().parent().find('form').serialize();
        // console.log(data);
        // return false;
        $.ajax({
            url: url_edit_cart_action,
            data: data+'&ajax=ajax&qty=0',
            dataType: 'html',
            type: 'post',
            success: function(msg){
                $( ".left-conts-tabl-cart" ).load( baseurl+"/cart/shop #cart-page" );
            },
            error: function(msg){
                alert('sending data error, cek your connection');
                console.log(msg);
            }
        });
        return false;
    })
    $(document).on('change', '.select_qty', function() {
        var data = $(this).parent().parent().parent().find('form').serialize();
        $.ajax({
            url: url_edit_cart_action,
            data: data+'&ajax=ajax',
            dataType: 'html',
            type: 'post',
            success: function(msg){
                $( ".left-conts-tabl-cart" ).load( baseurl+"/cart/shop #cart-page" );
            },
            error: function(msg){
                alert('sending data error, cek your connection');
                console.log(msg);
            }
        });
        return false;
    })
    $(document).on('click', '.btn-edit-cart', function() {
        var data = $(this).parent().parent().find('form').serialize();
        $.ajax({
            url: url_edit_cart_action,
            data: data+'&ajax=ajax',
            dataType: 'html',
            type: 'post',
            success: function(msg){
                $( ".left-conts-tabl-cart" ).load( baseurl+"/cart/shop #cart-page" );
            },
            error: function(msg){
                alert('sending data error, cek your connection');
                console.log(msg);
            }
        });
        return false;
    })
</script>
