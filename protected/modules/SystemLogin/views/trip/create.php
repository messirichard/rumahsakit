<?php
$this->breadcrumbs=array(
	'Trip'=>array('index'),
	'Add',
);
$this->pageHeader=array(
	'icon'=>'fa fa-user',
	'title'=>'Trip',
	'subtitle'=>'Tambah Trip',
);

$this->menu=array(
	array('label'=>'List Trip', 'icon'=>'th-list', 'url'=>array('index')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>