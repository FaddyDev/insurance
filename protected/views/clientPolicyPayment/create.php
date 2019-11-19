<?php
/* @var $this ClientPolicyPaymentController */
/* @var $model ClientPolicyPayment */

$this->breadcrumbs=array(
	'Client Policy Payments'=>array('admin'),
	'Pay',
);

$this->menu=array(
	array('label'=>'Policy Payments', 'url'=>array('admin')),
	array('label'=>'My Policies', 'url'=>array('clientPolicies/admin')),
);
?>

<h1>Pay for Policy</h1>


<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$theClientPolicy,
	'attributes'=>array(
		//'pk_cp_id',
		array(
			'label'=>'Provider',
			'value'=>$theClientPolicy->fkCpPolicy->fkPolicyProvider->provider_full_name,
			),
		array(
			'label'=>'Cover',
			'value'=>$theClientPolicy->fkCpPolicy->policy_cover_type,
			),
		//'policy_price',
		array(
			'label'=>'Price (Ksh)',
			'value'=>$theClientPolicy->fkCpPolicy->policy_price,
			),
		//'policy_period',
		array(
			'label'=>'Period (months)',
			'value'=>$theClientPolicy->fkCpPolicy->policy_period,
			),
		array(
			'label'=>'Policy Description',
			'value'=>$theClientPolicy->fkCpPolicy->policy_description,
			),
		array(
			'label'=>'My Set Period (months)',
			'value'=>$theClientPolicy->cp_policy_period,
			),
		array(
			'label'=>'Count',
			'value'=>$theClientPolicy->cp_policy_count,
			),
		array(
			'label'=>'Amount (Ksh)',
			'value'=>$theClientPolicy->cp_policy_amount,
			),
		array(
			'label'=>'Expiry Date',
			'value'=>$theClientPolicy->cp_policy_expiry_date,
			),
			'cp_status',
	),
)); ?>

<p>
	<h4>Payment Instructions</h4>
	<ol>
		<li>Go to <strong>M-PESA</strong> menu on your phone</li>
		<li>Select <strong>Lipa na M-PESA</strong></li>
		<li>Select <strong>Paybill</strong></li>
		<li>Enter business no. <strong>1234</strong></li>
		<li>Enter account no. <strong><?php echo $theClientPolicy->pk_cp_id; ?></strong>, which is your policy ID</li>
		<li>Enter amount <strong><?php echo $theClientPolicy->cp_policy_amount; ?></strong></li>
		<li>Enter PIN then send</li>
	</ol>
	<span>Input the receipt number in the field below then click create</span>
</p>

<?php $this->renderPartial('_form', array('model'=>$model,'fkPolicy'=>$theClientPolicy->pk_cp_id,'amount'=>$theClientPolicy->cp_policy_amount)); ?>