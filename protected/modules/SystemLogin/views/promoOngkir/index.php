<?php
$this->breadcrumbs=array(
	'Promo Ongkir',
);

$this->pageHeader=array(
	'icon'=>'fa fa-cubes',
	'title'=>'Promo Ongkir',
	'subtitle'=>'Data Promo Ongkir',
);

$this->menu=array(
	// array('label'=>'Add Promo Ongkir', 'icon'=>'plus-sign','url'=>array('create')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php if(Yii::app()->user->hasFlash('success')): ?>

    <?php $this->widget('bootstrap.widgets.TbAlert', array(
        'alerts'=>array('success'),
    )); ?>

<?php endif; ?>
<h1>Promo Ongkir</h1>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'promo-ongkir-grid',
	'dataProvider'=>$model->search(),
	// 'filter'=>$model,
	'enableSorting'=>false,
	'summaryText'=>false,
	'type'=>'bordered',
	'columns'=>array(
		// 'id',
		'maxnilaikg',
		array(
			'name'=>'status',
			'filter'=>array(
				'0'=>'Non Aktif',
				'1'=>'Aktif',
			),
			'type'=>'raw',
			'value'=>'($data->status == "1") ? "Aktif" : "Non Aktif"',
		),
		// 'status',
		// 'date_input',
		array(
			'name'=>'date_end',
			'filter'=>false,
			'type'=>'raw',
			'value'=>'date("d M Y", strtotime($data->date_end))',
		),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update}',
		),
	),
)); ?>
