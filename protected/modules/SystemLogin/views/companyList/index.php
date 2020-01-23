<?php
$this->breadcrumbs=array(
	'Company Member',
);

$this->pageHeader=array(
	'icon'=>'fa fa-minus',
	'title'=>'Company Member',
	'subtitle'=>'Data Company Member',
);

$this->menu=array(
	array('label'=>'Add Company Member', 'icon'=>'plus-sign','url'=>array('create')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php if(Yii::app()->user->hasFlash('success')): ?>

    <?php $this->widget('bootstrap.widgets.TbAlert', array(
        'alerts'=>array('success'),
    )); ?>

<?php endif; ?>
<h4 class="widgettitle">Company Member</h4>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'member-company-grid',
	'dataProvider'=>$model->search(),
	// 'filter'=>$model,
	'enableSorting'=>false,
	'summaryText'=>false,
	'type'=>'bordered',
	'columns'=>array(
		// 'id',
		'title',
		// 'sub_title',
		// 'content',
		// 'image',
		// 'sorting',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update} &nbsp; {delete}',
		),
	),
)); ?>
