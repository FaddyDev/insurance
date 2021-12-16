<?php
/* @var $this ClientCarPolicyController */
/* @var $model ClientCarPolicy */

$this->breadcrumbs=array(
	'Client Car Policies'=>array('index'),
	$model->pk_car_id,
);

$this->menu=array(
	//array('label'=>'List ClientCarPolicy', 'url'=>array('index')),
	//array('label'=>'Create ClientCarPolicy', 'url'=>array('create')),
	array('label'=>'Update Car Policy', 'url'=>array('update', 'id'=>$model->pk_car_id)),
	//array('label'=>'Delete ClientCarPolicy', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->pk_car_id),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Manage ClientCarPolicy', 'url'=>array('admin')),
	array('label'=>'My Policies', 'url'=>array('clientPolicies/admin')),
	array('label'=>'My Cars', 'url'=>array('admin', 'id'=>$model->fk_cp_id)),
);
?>

<h1>View Car Policy Details #<?php echo $model->pk_car_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'pk_car_id',
		'fk_cp_id',
		'car_number_plate',
		'car_model',
		'car_carrying_capacity',
		'car_year_of_manufacture',
		'car_use',
		'car_make',
		'car_value',
	),
)); ?>
