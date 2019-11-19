<?php
/* @var $this ClientsController */
/* @var $model Clients */

$this->breadcrumbs=array(
	'Clients'=>array('admin'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List Clients', 'url'=>array('index')),
	//array('label'=>'Create Clients', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#clients-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Clients</h1>

<!--<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>-->
<p>
	These are clients registered in the platform.
</p>

<?php /*echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<!--<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
));*/ ?>
<!--</div>--><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'clients-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'pk_client_id',
		array(
			'header'=>'#',
			'value'=>'CHtml::label($row+1+($this->grid->dataProvider->pagination->currentPage
			* $this->grid->dataProvider->pagination->pageSize),"",array("size" =>2))',
			'type'=>'raw',
			),
		'client_idno',
		'client_fname',
		'client_lname',
		'client_email',
		'client_occupation',
		/*
		'client_dob',
		'client_address',
		'client_bank_details',
		'client_photo',
		'client_username',
		'client_password',
		'created_at',
		'updated_at',
		*/
		/*array(
			'class'=>'CButtonColumn',
		),*/
	),
)); ?>
