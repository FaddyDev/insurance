<?php
/* @var $this ClientPolicyPaymentController */
/* @var $model ClientPolicyPayment */

$this->breadcrumbs=array(
	'Client Policy Payments'=>array('index'),
	$model->pk_policy_payment_id,
);

$this->menu=array(
	//array('label'=>'List ClientPolicyPayment', 'url'=>array('index')),
	//array('label'=>'Create ClientPolicyPayment', 'url'=>array('create')),
	//array('label'=>'Update ClientPolicyPayment', 'url'=>array('update', 'id'=>$model->pk_policy_payment_id)),
	//array('label'=>'Delete ClientPolicyPayment', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->pk_policy_payment_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Payments', 'url'=>array('admin')),
);
?>

<h1>View Client Policy Payment #<?php echo $model->pk_policy_payment_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'pk_policy_payment_id',
		'fk_policy_payment_cp_id',
		'policy_payment_amount',
		'policy_payment_receipt_no',
		'policy_payment_status',
		'policy_payment_datetime',
	),
)); 

//receipt pic if it exists
if($model->policy_payment_receipt_pic != NULL)
{
	echo "<span>Receipt Pic:</span><br>";
	echo CHtml::image(Yii::app()->baseUrl."/images/policy payments/".$model->policy_payment_receipt_pic,"");
}

?>
