<?php /*
<div id="content" class="container small-width">
    
    <h3 class="text-center color2 title">Account Information</h3>

    <ul class="nav nav-tabs upp" role="tablist" id="menu-profile">
        <li role="presentation" class="active">
            <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">profile</a>
        </li>

        <li role="presentation">
            <a href="#address" aria-controls="address" role="tab" data-toggle="tab">address</a>
        </li>

        <li role="presentation">
            <a href="#history" aria-controls="history" role="tab" data-toggle="tab">order history</a>
        </li>

        <li role="presentation">
            <a href="#credit" aria-controls="credit" role="tab" data-toggle="tab">credit</a>
        </li>
    </ul><!-- #menu-profile -->

    <div class="tab-content" id="content-profile">
        <div role="tabpanel" class="tab-pane active" id="profile">

            <form action="#" method="post">
                
                <?php /*
                <div class="row">
                    <label class="upp color1">username</label>
                    <a href="#">Edit</a>
                    <p>Antonius Sindhu</p>
                </div>
                * / ?>

                <div class="row">
                    <label class="upp color1">email address</label>
                    <a href="#">Edit</a>
                    <p><?php echo $model->email ?></p>
                </div>

                <div class="row">
                    <label class="upp color1">current password</label>
                    <a href="#">Edit</a>
                    <p>********</p>
                </div>

                <div class="row">
                    <label class="upp color1">No HP</label>
                    <a href="#">Edit</a>
                    <p><?php echo $model->hp ?></p>
                </div>

                <div class="row text-center">
                    <input type="submit" name="update" value="update" class="upp btn btn-bear" />
                </div>

            </form>

        </div><!-- #profile -->

        <div role="tabpanel" class="tab-pane" id="address">

            <form action="#" method="post">

                <div class="row">
                    <label class="upp color1">nama penerima</label>
                    <a href="#">Edit</a>
                    <p><?php echo $model->first_name ?> <?php echo $model->last_name ?></p>
                </div>

                <div class="row">
                    <label class="upp color1">alamat</label>
                    <a href="#">Edit</a>
                    <p>
                        <?php echo $model->address ?> <br>
                        <?php echo $model->postcode ?> <br>
                        <?php echo $model->city ?> <br>
                        <?php echo $model->province ?>
                    </p>
                </div>

                <div class="row text-center">
                    <input type="submit" name="update" value="update" class="upp btn btn-bear" />
                </div>

            </form>

        </div><!-- #address -->

        <div role="tabpanel" class="tab-pane " id="history">

            <?php for( $i=0;$i<3;$i++ ) : ?>

            <div class="row order-list">

                <div class="col-md-3 image">
                    <img width="100%" height="auto" src="<?php echo $this->assetBaseurl; ?>products-sample.jpg">
                </div>

                <div class="col-md-9 details">
                    <h5 class="upp color2">invoice number</h5>
                    <ul>
                        <li>Product Name</li>
                        <li>Tanggal Transaksi: <strong>06 April 2015</strong></li>
                        <li>Total: <strong>IDR 30.000</strong></li>
                    </ul>
                    <article>
                        <p>06 April 2015, 16.52 WIB - Pesanan telah dikirim</p>
                        <p>Pesanan</p>
                        <p>Nomor Resi: 8987869876</p>
                    </article>
                </div>

            </div><!-- .order-list -->

            <?php endfor ?>

        </div><!-- #history -->

    </div>

</div><!-- #content -->



*/ ?>



<section class="home-middle-content padding-top-50">
    <div class="prelatife container">
        <div class="clear height-15"></div>
        <div class="box-header-top-breadcumb">
        <div class="row">
          <div class="col-md-9 col-sm-9">
            <div class="breadcumb">
                <a href="<?php echo CHtml::normalizeUrl(array('/home/index')); ?>"><?php echo Tt::t('front', 'HOME') ?></a>
                &gt; <?php echo Tt::t('front', 'MY ACCOUNT') ?>
            </div>
          </div>
          <div class="col-md-3 col-sm-3">
          <?php /*
            <div class="sharer">SHARE: &nbsp;<a href="#"><i class="icon-twitter-ch"></i></a>&nbsp;
                    <a href="#"><i class="icon-facebook-ch"></i></a>&nbsp;
                    <a href="#"><i class="icon-gplus-ch"></i></a>&nbsp;
                    <a href="#"><i class="icon-pinterest-ch"></i></a>
                </div>
            */ ?>
          </div>
        </div> 
        </div>


        <div class="prelatife product-list-warp content-text">
            <div class="box-featured-latestproduct" id="cart-shop">
                <div class="box-product-detailg">


    <div class="inside-content">
        <!-- /. Start Content About -->
        <div class="m-ins-content m-ins-myaccount">
            <?php if(Yii::app()->user->hasFlash('success')): ?>
            
                <?php $this->widget('bootstrap.widgets.TbAlert', array(
                    'alerts'=>array('success'),
                )); ?>
            
            <?php endif; ?>
            
            <div class="margin-15">
            <div class="row">
                <div class="col-xs-12 col-md-7 col-sm-7">
                    <div class="padding-right-40">
                        <div class="box-account-history w519">
                            <h1 class="title-inside-page"><?php echo Tt::t('front', 'Order History') ?></h1>
                            <div class="clear height-30"></div>
                                
                                <table class="table table-striped tb-history-account">
                                    <thead>
                                        <tr>
                                            <th>Nomor Order</th>
                                            <th>Jumlah</th>
                                            <th>No. Resi</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($order->getData() as $key => $value): ?>
                                        <tr>
                                            <td>
                                            <?php echo $value->invoice_prefix.'-'.$value->invoice_no ?>
                                            <br>
                                                <span class="dates"><i class="fa fa-calendar"></i> &nbsp;<?php echo date('d F Y', strtotime($value->date_add)) ?></span>
                                            </td>
                                            <td><?php echo Tt::t('front', 'Total:') ?> <b><?php echo Cart::money($value->grand_total, 0) ?></td>
                                            <td>
                                                <?php if ($value->tracking_id != ''): ?>
                                                    <?php echo $value->tracking_id; ?>
                                                <?php endif ?>
                                            </td>
                                            <td><?php echo OrOrderStatus::model()->findByPk($value->order_status_id)->name ?></td>
                                            <td>
                                                <a href="<?php echo CHtml::normalizeUrl(array('/member/vieworder', 'nota'=>$value->invoice_prefix.'-'.$value->invoice_no)); ?>"><i class="fa fa-search fa-2x"></i></a>
                                                <a href="<?php echo CHtml::normalizeUrl(array('/member/print', 'nota'=>$value->invoice_prefix.'-'.$value->invoice_no)); ?>" target="_blank"><i class="fa fa-print fa-2x"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                    </tbody>
                                </table>
                                <?php $this->widget('CLinkPager', array(
                                    'pages' => $order->getPagination(),
                                )) ?>
                                <div class="clear height-15"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-5 col-sm-5">
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'user-form',
    'type'=>'horizontal',
    //'htmlOptions'=>array('class'=>'well'),
    'enableClientValidation'=>false,
    'clientOptions'=>array(
        'validateOnSubmit'=>false,
    ),
)); ?>
                    <div class="box-infomation-account w358">
                        <h1 class="title-inside-page"><?php echo Tt::t('front', 'Account Information') ?></h1>
                        <div class="clear height-30"></div>
                        
                        <div class="basic-information">

                                <?php echo CHtml::errorSummary($model, '', '', array('class'=>'alert alert-danger')); ?>


                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'passold', array('class'=>'col-sm-4 control-label')); ?>
                                    <div class="col-sm-5">
                                    <?php echo $form->passwordField($model, 'passold', array('class'=>'form-control')); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'pass', array('class'=>'col-sm-4 control-label')); ?>
                                    <div class="col-sm-5">
                                    <?php echo $form->passwordField($model, 'pass', array('class'=>'form-control')); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'pass2', array('class'=>'col-sm-4 control-label')); ?>
                                    <div class="col-sm-5">
                                    <?php echo $form->passwordField($model, 'pass2', array('class'=>'form-control')); ?>
                                    </div>
                                </div>

                         </div>

                         <div class="clear height-0"></div>
                         <div class="lines-grey"></div>
                         <div class="clear height-20"></div>
                         <div class="height-2"></div>

                         <div class="basic-information">
                            <h1 class="title-inside-page"><?php echo Tt::t('front', 'Delivery Information') ?></h1>
                            <div class="clear height-25"></div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'first_name', array('class'=>'control-label col-sm-4')) ?>
                                    <div class="col-sm-5">
                                        <?php echo $form->textField($model, 'first_name', array('class'=>'form-control')) ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'last_name', array('class'=>'control-label col-sm-4')) ?>
                                    <div class="col-sm-5">
                                        <?php echo $form->textField($model, 'last_name', array('class'=>'form-control')) ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'hp', array('class'=>'control-label col-sm-4')) ?>
                                    <div class="col-sm-5">
                                        <?php echo $form->textField($model, 'hp', array('class'=>'form-control')) ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'address', array('class'=>'control-label col-sm-4')) ?>
                                    <div class="col-sm-5">
                                        <?php echo $form->textField($model, 'address', array('class'=>'form-control')) ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'province', array('class'=>'control-label col-sm-4')) ?>
                                    <div class="col-sm-5">
                                        <?php echo $form->dropDownList($model, 'province',CHtml::listData(City::model()->findAll('1 GROUP BY province_id'),'province_id', 'province'), array('class'=>'form-control', 'empty'=>'Select State')) ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'city', array('class'=>'control-label col-sm-4')) ?>
                                    <div class="col-sm-5">
                                        <?php echo $form->dropDownList($model, 'city',array(), array('class'=>'form-control', 'empty'=>'Select City')) ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'district', array('class'=>'control-label col-sm-4')) ?>
                                    <div class="col-sm-5">
                                        <?php echo $form->dropDownList($model, 'district',array(), array('class'=>'form-control', 'empty'=>'Select District')) ?>
                                    </div>
                                </div>
<script type="text/javascript">
    $('#MeMember_province').change(function() {
        $.ajax({
            method: "GET",
            url: "<?php echo CHtml::normalizeUrl(array('getkota')); ?>",
            data: { id: $('#MeMember_province').val() }
        }).done(function(e) {
            $('#MeMember_city').html(e);
        });     
    })

    $.ajax({
        method: "GET",
        url: "<?php echo CHtml::normalizeUrl(array('getkota')); ?>",
        data: { id: $('#MeMember_province').val() }
    }).done(function(e) {
        $('#MeMember_city').html(e);
        $('#MeMember_city').val('<?php echo $model->city ?>');
    });

    // get district
    $('#MeMember_province').change(function() {
        $.ajax({
            method: "GET",
            url: "<?php echo CHtml::normalizeUrl(array('getkota')); ?>",
            data: { id: $('#MeMember_province').val() }
        }).done(function(e) {
            $('#MeMember_city').html(e);
        });     
    })
    
    $.ajax({
        method: "GET",
        url: "<?php echo CHtml::normalizeUrl(array('getkota')); ?>",
        data: { id: $('#MeMember_province').val() }
    }).done(function(e) {
        $('#MeMember_city').html(e);
        $('#MeMember_city').val('<?php echo $model->city ?>');
    });     

    $('#MeMember_city').change(function() {
        $.ajax({
            method: "GET",
            url: "<?php echo CHtml::normalizeUrl(array('/member/getkecamatan')); ?>",
            data: { id: $('#MeMember_city').val() }
        }).done(function(e) {
            $('#MeMember_district').html(e);
        });
        return false;
    });

    $.ajax({
            method: "GET",
            url: "<?php echo CHtml::normalizeUrl(array('/member/getkecamatan')); ?>",
            data: { id: <?php echo $model->city ?> }
        }).done(function(e) {
            $('#MeMember_district').html(e);
            $('#MeMember_district').val('<?php echo $model->district; ?>');
    });
</script>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'postcode', array('class'=>'control-label col-sm-4')) ?>
                                    <div class="col-sm-5">
                                        <?php echo $form->textField($model, 'postcode', array('class'=>'form-control')) ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label" for="input"></label>
                                    <div class="col-sm-5">
                                        <button type="submit" class="btn btn-primary"><?php echo Tt::t('front', 'EDIT') ?></button>
                                    </div>
                                </div>


                         </div>

                    </div>
<?php $this->endWidget(); ?>
                </div>
            </div>
            </div>

            <div class="clear height-25"></div>

            <div class="clear"></div>
        </div>
        <!-- /. End Content About -->

        <div class="clear height-15"></div>

    <div class="clear"></div>
    </div>



    <div class="clear"></div>

                </div>
            </div>
        </div>

    </div>
    <div class="clear"></div>
</section>
