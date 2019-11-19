<?php
/* @var $this ClientPoliciesController */
/* @var $model ClientPolicies */

$this->breadcrumbs=array(
	'Client Policies'=>array('index'),
	$model->pk_cp_id,
);

$this->menu=array(
	//array('label'=>'List ClientPolicies', 'url'=>array('index')),
	array('label'=>'Buy Another Policy', 'url'=>array('policy/admin')),
	array('label'=>'Update Policy', 'url'=>array('update', 'id'=>$model->pk_cp_id)),
	array('label'=>'Delete Policy', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->pk_cp_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage My Policies', 'url'=>array('admin')),
	array('label'=>'Policy Payments', 'url'=>array('clientPolicyPayment/admin')),
);
?>

<h1>Policy #<?php echo $model->pk_cp_id; ?></h1>

<?php
if(isset($_SESSION['status']) && isset($_SESSION['response'])){
	$status = $_SESSION['status']; $response = $_SESSION['response'];
	if($status == 'success'){
		echo '<br><br><p class="alert alert-success">'.$response.'</p><br><br>';
	}
	else{
		echo '<br><br><p class="alert alert-warning">'.$response.'</p><br><br>';
	}
	unset($_SESSION['status'],$_SESSION['response']);
}
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'pk_cp_id',
		//'fk_cp_client_id',
		//'fk_cp_policy_id',
		array(
			'name'=>'fk_cp_policy_id',
			'value'=>$model->fkCpPolicy->policy_cover_type,
			),
		//'cp_policy_period',
		array(
			'label'=>'Period (months)',
			'value'=>$model->cp_policy_period,
			),
		//'cp_policy_amount',
		array(
			'label'=>'Amount (Ksh)',
			'value'=>$model->cp_policy_amount,
			),
		'cp_policy_expiry_date',
		'cp_policy_count',
		'cp_status',
	),
)); ?>
