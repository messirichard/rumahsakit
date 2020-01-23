<?php
$this->breadcrumbs=array(
	'Product Accessories'=>array('index'),
	'Add',
);

$this->pageHeader=array(
	'icon'=>'fa fa-life-ring',
	'title'=>'Product Accessories',
	'subtitle'=>'Add Product Accessories',
);

$this->menu=array(
	// array('label'=>'List Product Accessories', 'icon'=>'th-list','url'=>array('index')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form', array('model'=>$model, 'modelDesc'=>$modelDesc, 'modelAttributes'=>$modelAttributes, 'modelImage'=>$modelImage, 'modelColor'=>$modelColor,)); ?>