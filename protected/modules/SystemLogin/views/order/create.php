<?php
$this->breadcrumbs=array(
	'Order'=>array('index'),
	'Add',
);
$this->pageHeader=array(
	'icon'=>'fa fa-fax',
	'title'=>'Order',
	'subtitle'=>'Tambah Order',
);

$this->menu=array(
	array('label'=>'List User', 'icon'=>'th-list', 'url'=>array('index')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>