<?php
/* @var $this PolicyController */
/* @var $model Policy */

$this->breadcrumbs=array(
	'Policies'=>array('admin'),
	$model->pk_policy_id,
);

$this->menu=array(
	//array('label'=>'List Policy', 'url'=>array('index')),
	array('label'=>'Create Policy', 'url'=>array('create')),
	array('label'=>'Update Policy', 'url'=>array('update', 'id'=>$model->pk_policy_id)),
	array('label'=>'Delete Policy', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->pk_policy_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Policies', 'url'=>array('admin')),
);
?>

<h1>View Policy #<?php echo $model->pk_policy_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'pk_policy_id',
		//'fk_policy_provider_id',
		array(
			'name'=>'fk_policy_provider_id',
			'value'=>$model->fkPolicyProvider->provider_full_name,
			),
		'policy_cover_type',
		//'policy_price',
		array(
			'name'=>'policy_price',
			//'label'=>'Price (Ksh)',
			'value'=>$model->policy_cover_type=="Car"? $model->policy_price."%" : "Ksh ".$model->policy_price,
			),
		//'policy_period',
		array(
			'label'=>'Period (months)',
			'value'=>$model->policy_period,
			),
		'policy_description',
	),
)); ?>
