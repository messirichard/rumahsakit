<?php
$this->breadcrumbs=array(
	'Company Member'=>array('index'),
	'Add',
);

$this->pageHeader=array(
	'icon'=>'fa fa-minus',
	'title'=>'Company Member',
	'subtitle'=>'Add Company Member',
);

$this->menu=array(
	array('label'=>'List Company Member', 'icon'=>'th-list','url'=>array('index')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>