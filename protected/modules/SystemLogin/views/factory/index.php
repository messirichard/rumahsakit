<?php
$this->breadcrumbs=array(
	'Factory',
);

$this->pageHeader=array(
	'icon'=>'fa fa-bank',
	'title'=>'Factory',
	'subtitle'=>'Data Factory',
);

$this->menu=array(
	array('label'=>'Add Factory', 'icon'=>'plus-sign','url'=>array('create')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php if(Yii::app()->user->hasFlash('success')): ?>

    <?php $this->widget('bootstrap.widgets.TbAlert', array(
        'alerts'=>array('success'),
    )); ?>

<?php endif; ?>
<div class="row-fluid">
	<div class="span8">
<h1>Factory</h1>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'bank-grid',
	'dataProvider'=>$model->search(),
	// 'filter'=>$model,
	'enableSorting'=>false,
	'summaryText'=>false,
	'type'=>'bordered',
	'columns'=>array(
		// 'id',
		// 'ib_bank',
		'nama',
		'telp',
		'email',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update} &nbsp; {delete}',
		),
	),
)); ?>
</div>
	<div class="span4">
		<?php $this->renderPartial('/setting/page_menu') ?>
	</div>
</div>