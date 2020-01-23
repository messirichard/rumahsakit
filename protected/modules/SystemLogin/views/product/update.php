<?php
$this->breadcrumbs=array(
	'Product Accessories'=>array('index'),
	// $model->id=>array('view','id'=>$model->id),
	'Edit',
);
$this->pageHeader=array(
	'icon'=>'fa fa-life-ring',
	'title'=>'Product Accessories',
	'subtitle'=>'Edit Product Accessories',
);

$this->menu=array(
	array('label'=>'List Product Accessories', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add Product Accessories', 'icon'=>'plus-sign','url'=>array('create')),
	// array('label'=>'View Product Accessories', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form',array('model'=>$model, 'modelDesc'=>$modelDesc, 'modelAttributes'=>$modelAttributes, 'modelImage'=>$modelImage, 'modelColor'=>$modelColor,)); ?>