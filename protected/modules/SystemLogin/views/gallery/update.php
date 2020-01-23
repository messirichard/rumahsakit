<?php
$this->breadcrumbs=array(
	'Application'=>array('index'),
	// $model->id=>array('view','id'=>$model->id),
	'Edit',
);

$this->pageHeader=array(
	'icon'=>'fa fa-tag',
	'title'=>'Application',
	'subtitle'=>'Data Application',
);

$this->menu=array(
	array('label'=>'List Application', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add Application', 'icon'=>'plus-sign','url'=>array('create')),
	// array('label'=>'View Application', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form',array('model'=>$model, 'modelDesc'=>$modelDesc, 'modelImage'=>$modelImage)); ?>
