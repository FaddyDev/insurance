<?php
/* @var $this ClientPoliciesController */
/* @var $model ClientPolicies */

$this->breadcrumbs=array(
	'Client Policies'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List ClientPolicies', 'url'=>array('index')),
	array('label'=>'Manage My Policies', 'url'=>array('admin')),
);
?>

<h1>Buy Policy</h1>

<p>
	Here, you simply place a request to buy the policy. The provider will review then approve or disapprove.
	You can only make payment when approved.
</p>
<?php
if(isset($_SESSION['status']) && isset($_SESSION['response'])){
	$status = $_SESSION['status']; $response = $_SESSION['response'];
	if($status == 'success'){
		echo '<p class="alert alert-success">'.$response.'</p>';
	}
	else{
		echo '<p class="alert alert-warning">'.$response.'</p>';
	}
	unset($_SESSION['status'],$_SESSION['response']);
}
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$thePolicy,
	'attributes'=>array(
		//'pk_policy_id',
		array(
			'name'=>'fk_policy_provider_id',
			'value'=>$thePolicy->fkPolicyProvider->provider_full_name,
			),
		'policy_cover_type',
		//'policy_price',
		array(
			'name'=>'policy_price',
			//'label'=>'Price (Ksh)',
			'value'=>$thePolicy->policy_cover_type=="Car"? $thePolicy->policy_price."%" : "Ksh ".$thePolicy->policy_price,
			),
		//'policy_period',
		array(
			'label'=>'Period (months)',
			'value'=>$thePolicy->policy_period,
			),
		'policy_description',
	),
)); ?>
<?php $this->renderPartial('_form', array('model'=>$model,'policy_id'=>$thePolicy->pk_policy_id)); ?>