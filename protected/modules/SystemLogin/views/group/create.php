<?php
$this->breadcrumbs=array(
	'Administrator'=>array('/SystemLogin/administrator/index'),
	'Group Add',
);
$this->pageHeader=array(
	'icon'=>'fa fa-user',
	'title'=>'Administrator',
	'subtitle'=>'Add Group',
);

$this->menu=array(
	array('label'=>'List Group', 'icon'=>'th-list','url'=>array('/SystemLogin/administrator/index')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>