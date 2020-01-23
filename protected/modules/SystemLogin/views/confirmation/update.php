<?php
$this->breadcrumbs=array(
	'Payment Confirmation'=>array('index'),
	// $model->id=>array('view','id'=>$model->id),
	'Edit',
);

$this->pageHeader=array(
	'icon'=>'fa fa-bank',
	'title'=>'Payment Confirmation',
	'subtitle'=>'Edit Payment Confirmation',
);

$this->menu=array(
	array('label'=>'List Payment Confirmation', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add Payment Confirmation', 'icon'=>'plus-sign','url'=>array('create')),
	// array('label'=>'View Payment Confirmation', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>