<?php
$this->breadcrumbs=array(
	'Payment Confirmation'=>array('index'),
	'Add',
);

$this->pageHeader=array(
	'icon'=>'fa fa-bank',
	'title'=>'Payment Confirmation',
	'subtitle'=>'Add Payment Confirmation',
);

$this->menu=array(
	array('label'=>'List Payment Confirmation', 'icon'=>'th-list','url'=>array('index')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>