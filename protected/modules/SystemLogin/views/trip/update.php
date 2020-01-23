<?php
$this->breadcrumbs=array(
	'Trip'=>array('index'),
	'Edit Trip',
);
$this->pageHeader=array(
	'icon'=>'fa fa-user',
	'title'=>'Trip',
	'subtitle'=>'Update Trip',
);

$this->menu=array(
	array('label'=>'List Trip', 'icon'=>'th-list', 'url'=>array('index')),
	array('label'=>'Add Trip', 'icon'=>'plus-sign', 'url'=>array('create')),
	// array('label'=>'View User', 'icon'=>'eye-open', 'url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>