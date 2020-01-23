<?php
$this->breadcrumbs=array(
	'Product Accessories',
);
$this->pageHeader=array(
	'icon'=>'fa fa-life-ring',
	'title'=>'Product Accessories',
	'subtitle'=>'Data Product Accessories',
);

$this->menu=array(
	array('label'=>'Add Product Accessories', 'icon'=>'icon-plus-sign','url'=>array('create')),
);
?>
<?php if(Yii::app()->user->hasFlash('success')): ?>
    <?php $this->widget('bootstrap.widgets.TbAlert', array(
        'alerts'=>array('success'),
    )); ?>
<?php endif; ?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<div class="row-fluid">
	<div class="span12">
		<div class="widgetbox block-rightcontent">                        
		    <div class="headtitle">
		        <h4 class="widgettitle">Data Product Accessories</h4>
		    </div>
		    <div class="widgetcontent">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'htmlOptions'=>array('class'=>'hide hidden'),
)); ?>
	<div class="row-fluid">
		<div class="span4">
			<?php echo $form->textFieldRow($model,'kode',array('class'=>'span12','maxlength'=>200, 'placeholder'=>'Search Product Code')); ?>
		</div>
		<div class="span4">
			<?php echo $form->textFieldRow($model,'name',array('class'=>'span12','maxlength'=>200, 'placeholder'=>'Search Product Name')); ?>
		</div>
		<div class="span4">
			<label class="required" for="PrdProduct_category_id">Category</label>
			<select id="PrdProduct_category_id" name="PrdProduct[category_id]" class="input-block-level span12">
				<?php 
				$dataCategory = (PrdCategory::model()->categoryTree('category', $this->languageID));
				?>
				<option value="">---- Choose Category ----</option>
				<?php echo PrdCategory::model()->createOption($dataCategory) ?>				
			</select>
		</div>
	</div>

	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'primary',
		'label'=>'Search',
	)); ?>
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		// 'buttonType'=>'button',
		'type'=>'primary',
		'label'=>'Reset',
		'url'=>Yii::app()->createUrl($this->route),
	)); ?>

<?php $this->endWidget(); ?>

				<hr>
				<?php
				$search = $model->search($this->languageID);
				$data = $search->getData();
				?>
				<?php $this->widget('CLinkPager', array(
				    'pages' => $search->getPagination(),
				)) ?>
				<hr>
				<style type="text/css">
					.list-product .thumbs{
						float: left; width: 45%;
					}
					.list-product .thumbs img{
						
					}
					.list-product .info{
						float: left;
						width: 46%;
						padding-left: 20px;
						padding-right: 15px;
					}
					.list-product .span6{
						margin-left: 0;
						padding: 0 15px 30px;
					}
				</style>
				<div class="row-fluid list-product">
				<?php $counts_data = array_chunk($data, 2); ?>
				<?php foreach ($data as $key => $value): ?>
					<div class="span6" style="text-align: left;">
						<div class="thumbs">
						<img style="width: 100%; max-width: 250px;" src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(500,500, '/images/product/'.$value->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>"/>
						</div>
						<div class="info">
							<h3 class="title-product"><?php echo ucwords($value->name) ?></h3>
							<div class="row-fluid">
								<div class="span">
									<p><?php echo substr(strip_tags($value->desc), 0, 200) ?></p>
									<a href="<?php echo CHtml::normalizeUrl(array('update', 'id'=>$value->id)); ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
									<a href="<?php echo CHtml::normalizeUrl(array('delete', 'id'=>$value->id)); ?>" class="btn btn-primary delete-product"><i class="fa fa-trash-o"></i></a>
									<!-- <a href="<?php echo CHtml::normalizeUrl(array('update', 'id'=>$value->id, 'type'=>'copy')); ?>" class="btn btn-primary"><i class="fa fa-copy"></i></a> -->
									<a data-id="<?php echo $value->status ?>" href="<?php echo CHtml::normalizeUrl(array('setStatus', 'id'=>$value->id, 'type'=>'status')); ?>" class="btn btn-inverse btn-hide-show"><i class="fa fa-eye"></i></a>
								</div>
							<div class="clearfix"></div>
						</div>
					</div>
					<div class="clearfix"></div>
					<?php /*
					<div class="span7">
							<div class="span7 hide hidden">
				                <table class="table table-bordered responsive table-slim hide hidden">
				                	<thead>
				                        <tr>
				                            <th>Item Code</th>
				                            <th>Stock</th>
				                        </tr>
				                	</thead>
				                    <tbody>
				                        <tr>
				                            <td><?php echo $value->kode ?></td>
				                            <td><?php echo $value->stock ?></td>
				                        </tr>
				                    </tbody>
				                	<thead>
				                        <tr>
				                            <th>Price</th>
				                            <th>Category</th>
				                        </tr>
				                	</thead>
				                    <tbody>
				                        <tr>
				                            <td><?php echo Cart::money($value->harga) ?> <span style="color: red; text-decoration: line-through;"><?php echo Cart::money($value->harga_coret) ?></span></td>
				                            <td><?php echo ViewCategory::model()->find('category_id = :category_id AND language_id = :language_id', array(':category_id'=>$value->category_id, ':language_id'=>$this->languageID))->name ?></td>
				                        </tr>
				                    </tbody>
				                </table>
				                <div class="divider5"></div>
                            	<a data-id="<?php echo $value->terbaru ?>" href="<?php echo CHtml::normalizeUrl(array('setStatus', 'id'=>$value->id, 'type'=>'terbaru')); ?>" class="btn btn-small btn-primary btn-terbaru">Terbaru <i class="fa fa-check-square-o"></i></a>
                            	<a data-id="<?php echo $value->terlaris ?>" href="<?php echo CHtml::normalizeUrl(array('setStatus', 'id'=>$value->id, 'type'=>'terlaris')); ?>" class="btn btn-small btn-terlaris">Featured <i class="fa fa-square-o"></i></a>
                            	<a data-id="<?php echo $value->out_stock ?>" href="<?php echo CHtml::normalizeUrl(array('setStatus', 'id'=>$value->id, 'type'=>'out_stock')); ?>" class="btn btn-small btn-out-stock">Out Of Stock <i class="fa fa-square-o"></i></a>
							</div>
						</div>
						*/ ?>
					</div>
				<?php endforeach ?>
				</div>
				<?php $this->widget('CLinkPager', array(
				    'pages' => $search->getPagination(),
				)) ?>

		    </div><!--widgetcontent-->
		</div>
	</div>
	<script type="text/javascript">
		jQuery(function ( $ ) {
			$('.btn-hide-show').setStatusAjax({
				content: '<i class="fa fa-eye-slash"></i>',
				contentOK: '<i class="fa fa-eye"></i>',
				class: 'btn-ok',
				classOK: 'btn-inverse',
			})
			$('.btn-terbaru').setStatusAjax({
				content: 'Terbaru <i class="fa fa-square-o">',
				contentOK: 'Terbaru <i class="fa fa-check-square-o">',
				class: 'btn-ok',
				classOK: 'btn-primary',
			})
			$('.btn-terlaris').setStatusAjax({
				content: 'Featured <i class="fa fa-square-o">',
				contentOK: 'Featured <i class="fa fa-check-square-o">',
				class: 'btn-ok',
				classOK: 'btn-primary',
			})
			$('.btn-out-stock').setStatusAjax({
				content: 'Out of Stock <i class="fa fa-square-o">',
				contentOK: 'Out of Stock <i class="fa fa-check-square-o">',
				class: 'btn-ok',
				classOK: 'btn-primary',
			})
			$('.delete-product').deleteAjax({
			})
		})
	</script>
	<?php /*
	<div class="span4">
		<?php $this->renderPartial('product_category', array(
			'categoryModel'=>$categoryModel,
			'categoryModelDesc'=>$categoryModelDesc,
			'nestedCategory'=>$nestedCategory,
		)) ?>
	</div>
	*/ ?>
</div>
