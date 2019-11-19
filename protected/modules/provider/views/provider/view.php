<?php
/* @var $this ProviderController */
/* @var $model Provider */

$this->breadcrumbs=array(
	'Providers'=>array('index'),
	$model->pk_provider_id,
);

$this->menu=array(
	array('label'=>'List Provider', 'url'=>array('index')),
	array('label'=>'Create Provider', 'url'=>array('create')),
	array('label'=>'Update Provider', 'url'=>array('update', 'id'=>$model->pk_provider_id)),
	array('label'=>'Delete Provider', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->pk_provider_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Provider', 'url'=>array('admin')),
);
?>

<h1>View Provider #<?php echo $model->pk_provider_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'pk_provider_id',
		'provider_full_name',
		'provider_email',
		'provider_logo',
		'provider_username',
		'provider_password',
	),
)); ?>
