<?php
$this->breadcrumbs=array(
	'Banner'=>array('index'),
	'Add',
);

$this->pageHeader=array(
	'icon'=>'fa fa-image',
	'title'=>'Banner',
	'subtitle'=>'Data Banner',
);

$this->menu=array(
	array('label'=>'List Banner', 'icon'=>'th-list','url'=>array('index')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
