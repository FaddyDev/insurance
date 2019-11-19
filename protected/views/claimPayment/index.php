<?php
/* @var $this ClaimPaymentController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Claim Payments',
);

$this->menu=array(
	array('label'=>'Create ClaimPayment', 'url'=>array('create')),
	array('label'=>'Manage ClaimPayment', 'url'=>array('admin')),
);
?>

<h1>Claim Payments</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
