<?php
$this->breadcrumbs=array(
	'Application'=>array('index'),
	'Add',
);

$this->pageHeader=array(
	'icon'=>'fa fa-tag',
	'title'=>'Application',
	'subtitle'=>'Data Application',
);

$this->menu=array(
	array('label'=>'List Application', 'icon'=>'th-list','url'=>array('index')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form', array('model'=>$model, 'modelDesc'=>$modelDesc, 'modelImage'=>$modelImage)); ?>
