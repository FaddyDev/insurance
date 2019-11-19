<?php
/* @var $this ClientPoliciesController */
/* @var $model ClientPolicies */

$this->breadcrumbs=array(
	'Client Policies'=>array('index'),
	$model->pk_cp_id=>array('view','id'=>$model->pk_cp_id),
	'Update',
);

$this->menu=array(
	//array('label'=>'List ClientPolicies', 'url'=>array('index')),
	array('label'=>'Buy Another Policy', 'url'=>array('policy/admin')),
	array('label'=>'View Policy', 'url'=>array('view', 'id'=>$model->pk_cp_id)),
	array('label'=>'Manage Policies', 'url'=>array('admin')),
);
?>

<h1>Update Policy #<?php echo $model->pk_cp_id; ?></h1>


<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'pk_cp_id',
		array(
			'label'=>'Provider',
			'value'=>$model->fkCpPolicy->fkPolicyProvider->provider_full_name,
			),
		array(
			'label'=>'Cover',
			'value'=>$model->fkCpPolicy->policy_cover_type,
			),
		//'policy_price',
		array(
			'label'=>'Price (Ksh)',
			'value'=>$model->fkCpPolicy->policy_price,
			),
		//'policy_period',
		array(
			'label'=>'Period (months)',
			'value'=>$model->fkCpPolicy->policy_period,
			),
		array(
			'label'=>'Policy Description',
			'value'=>$model->fkCpPolicy->policy_description,
			),
		array(
			'label'=>'My Set Period (months)',
			'value'=>$model->cp_policy_period,
			),
		array(
			'label'=>'Count',
			'value'=>$model->cp_policy_count,
			),
		array(
			'label'=>'Amount (Ksh)',
			'value'=>$model->cp_policy_amount,
			),
		array(
			'label'=>'Expiry Date',
			'value'=>$model->cp_policy_expiry_date,
			),
			'cp_status',
	),
)); ?>

<?php $this->renderPartial('_form', array('model'=>$model,'policy_id'=>$thePolicy->pk_policy_id)); ?>