<?php
$this->breadcrumbs=array(
	'Certificates'=>array('index'),
	'Add',
);

$this->pageHeader=array(
	'icon'=>'fa fa-minus',
	'title'=>'Certificates',
	'subtitle'=>'Add Certificates',
);

$this->menu=array(
	array('label'=>'List Certificates', 'icon'=>'th-list','url'=>array('index')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>