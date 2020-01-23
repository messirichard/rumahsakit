<?php
$this->breadcrumbs=array(
	'Banner'=>array('index'),
	// $model->id=>array('view','id'=>$model->id),
	'Edit',
);

$this->pageHeader=array(
	'icon'=>'fa fa-image',
	'title'=>'Banner',
	'subtitle'=>'Data Banner',
);

$this->menu=array(
	array('label'=>'List Banner', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add Banner', 'icon'=>'plus-sign','url'=>array('create')),
	// array('label'=>'View Banner', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
