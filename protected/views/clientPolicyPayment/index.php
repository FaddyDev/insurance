<?php
/* @var $this ClientPolicyPaymentController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Client Policy Payments',
);

$this->menu=array(
	array('label'=>'Create ClientPolicyPayment', 'url'=>array('create')),
	array('label'=>'Manage ClientPolicyPayment', 'url'=>array('admin')),
);
?>

<h1>Client Policy Payments</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
