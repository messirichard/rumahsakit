<?php
$this->breadcrumbs=array(
	'Member Companies'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List MemberCompany', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add MemberCompany', 'icon'=>'plus-sign','url'=>array('create')),
	array('label'=>'Edit MemberCompany', 'icon'=>'pencil','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete MemberCompany', 'icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View MemberCompany #<?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'sub_title',
		'content',
		'image',
		'sorting',
	),
)); ?>
