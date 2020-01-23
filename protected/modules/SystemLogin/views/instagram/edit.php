<?php
$this->breadcrumbs=array(
	// 'Users'=>array('index'),
	'Change Password',
);
$this->pageHeader=array(
	'icon'=>'fa fa-user',
	'title'=>'Administrator',
	'subtitle'=>'Update Administrator',
);

$this->menu=array(
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_formedit',array('model'=>$model)); ?>