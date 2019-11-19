<?php
/* @var $this ClientsController */
/* @var $model Clients */

$this->breadcrumbs=array(
	'Clients'=>array('index'),
	$model->pk_client_id,
);

$this->menu=array(
	array('label'=>'List Clients', 'url'=>array('index')),
	array('label'=>'Create Clients', 'url'=>array('create')),
	array('label'=>'Update Clients', 'url'=>array('update', 'id'=>$model->pk_client_id)),
	array('label'=>'Delete Clients', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->pk_client_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Clients', 'url'=>array('admin')),
);
?>

<h1>View Clients #<?php echo $model->pk_client_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'pk_client_id',
		'client_idno',
		'client_fname',
		'client_lname',
		'client_email',
		'client_occupation',
		'client_dob',
		'client_address',
		'client_bank_details',
		'client_photo',
		'client_username',
		'client_password',
		'created_at',
		'updated_at',
	),
)); ?>
