<?php
/* @var $this ClaimPaymentController */
/* @var $model ClaimPayment */

$this->breadcrumbs=array(
	'Claim Payments'=>array('index'),
	$model->pk_claim_payment_id=>array('view','id'=>$model->pk_claim_payment_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ClaimPayment', 'url'=>array('index')),
	array('label'=>'Create ClaimPayment', 'url'=>array('create')),
	array('label'=>'View ClaimPayment', 'url'=>array('view', 'id'=>$model->pk_claim_payment_id)),
	array('label'=>'Manage ClaimPayment', 'url'=>array('admin')),
);
?>

<h1>Update ClaimPayment <?php echo $model->pk_claim_payment_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model,'theClaim'=>$theClaim)); ?>