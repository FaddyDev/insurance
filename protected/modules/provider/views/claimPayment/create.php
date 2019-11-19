<?php
/* @var $this ClaimPaymentController */
/* @var $model ClaimPayment */

$this->breadcrumbs=array(
	'Claim Payments'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ClaimPayment', 'url'=>array('index')),
	array('label'=>'Manage ClaimPayment', 'url'=>array('admin')),
);
?>

<h1>Create ClaimPayment</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'theClaim'=>$theClaim)); ?>