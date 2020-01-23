<?php
$this->breadcrumbs=array(
	'Certificates'=>array('index'),
	// $model->title=>array('view','id'=>$model->id),
	'Edit',
);

$this->pageHeader=array(
	'icon'=>'fa fa-minus',
	'title'=>'Certificates',
	'subtitle'=>'Edit Certificates',
);

$this->menu=array(
	array('label'=>'List Certificates', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add Certificates', 'icon'=>'plus-sign','url'=>array('create')),
	// array('label'=>'View Certificates', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>