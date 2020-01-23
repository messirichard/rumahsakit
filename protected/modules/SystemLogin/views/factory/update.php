<?php
$this->breadcrumbs=array(
	'Factory'=>array('index'),
	// $model->id=>array('view','id'=>$model->id),
	'Edit',
);

$this->pageHeader=array(
	'icon'=>'fa fa-bank',
	'title'=>'Factory',
	'subtitle'=>'Edit Factory',
);

$this->menu=array(
	array('label'=>'List Factory', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add Factory', 'icon'=>'plus-sign','url'=>array('create')),
	// array('label'=>'View Factory', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>