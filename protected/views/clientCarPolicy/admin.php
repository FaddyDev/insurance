<?php
/* @var $this ClientCarPolicyController */
/* @var $model ClientCarPolicy */

$this->breadcrumbs=array(
	'Client Car Policies'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List ClientCarPolicy', 'url'=>array('index')),
	//array('label'=>'Create ClientCarPolicy', 'url'=>array('create')),
	array('label'=>'My Policies', 'url'=>array('clientPolicies/admin')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#client-car-policy-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Client Car Policies</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'client-car-policy-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'pk_car_id',
		'fk_cp_id',
		'car_number_plate',
		'car_model',
		'car_carrying_capacity',
		'car_year_of_manufacture',
		/*
		'car_use',
		'car_make',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
