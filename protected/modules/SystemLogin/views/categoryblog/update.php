<?php
$this->breadcrumbs=array(
	'Kategori'=>array('/SystemLogin/product/index'),
	'Edit'
);
$this->pageHeader=array(
	'icon'=>'fa fa-tags',
	'title'=>'Blog',
	'subtitle'=>'Category Blog',
);

if ($_GET['type'] == 'blog') {
	$this->menu=array(
		array('label'=>'Kembali', 'icon'=>'chevron-left','url'=>array('/SystemLogin/blog/index')),
	);
}else{
	$this->menu=array(
		array('label'=>'Kembali', 'icon'=>'chevron-left','url'=>array('/SystemLogin/categoryblog/index')),
	);
}
?>
<div class="row-fluid">
	<div class="span8">

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form',array('model'=>$model, 'modelDesc'=>$modelDesc)); ?>
	</div>
	<div class="span4 hide hidden">
		<?php $this->renderPartial('/product/product_category', array(
			'categoryModel'=>$categoryModel,
			'categoryModelDesc'=>$categoryModelDesc,
			'nestedCategory'=>$nestedCategory,
		)) ?>
	</div>
</div>
