<?php
/* @var $this ClientPolicyPaymentController */
/* @var $model ClientPolicyPayment */

$this->breadcrumbs=array(
	'Client Policy Payments'=>array('index'),
	$model->pk_policy_payment_id=>array('view','id'=>$model->pk_policy_payment_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ClientPolicyPayment', 'url'=>array('index')),
	array('label'=>'Create ClientPolicyPayment', 'url'=>array('create')),
	array('label'=>'View ClientPolicyPayment', 'url'=>array('view', 'id'=>$model->pk_policy_payment_id)),
	array('label'=>'Manage ClientPolicyPayment', 'url'=>array('admin')),
);
?>

<h1>Update ClientPolicyPayment <?php echo $model->pk_policy_payment_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>