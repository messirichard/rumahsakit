<?php
$this->breadcrumbs=array(
	'Instagram'=>array('index'),
	'Add',
);
$this->pageHeader=array(
	'icon'=>'fa fa-user',
	'title'=>'Instagram',
	'subtitle'=>'Tambah Instagram',
);

$this->menu=array(
	array('label'=>'List Instagram', 'icon'=>'th-list', 'url'=>array('index')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>