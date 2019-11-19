<?php
/* @var $this ClientPolicyPaymentController */
/* @var $model ClientPolicyPayment */

$this->breadcrumbs=array(
	'Client Policy Payments'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ClientPolicyPayment', 'url'=>array('index')),
	array('label'=>'Manage ClientPolicyPayment', 'url'=>array('admin')),
);
?>

<h1>Create ClientPolicyPayment</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>