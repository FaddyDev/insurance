<?php
/* @var $this ClientPolicyPaymentController */
/* @var $data ClientPolicyPayment */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('pk_policy_payment_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->pk_policy_payment_id), array('view', 'id'=>$data->pk_policy_payment_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fk_policy_payment_cp_id')); ?>:</b>
	<?php echo CHtml::encode($data->fk_policy_payment_cp_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('policy_payment_amount')); ?>:</b>
	<?php echo CHtml::encode($data->policy_payment_amount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('policy_payment_receipt_no')); ?>:</b>
	<?php echo CHtml::encode($data->policy_payment_receipt_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('policy_payment_status')); ?>:</b>
	<?php echo CHtml::encode($data->policy_payment_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('policy_payment_datetime')); ?>:</b>
	<?php echo CHtml::encode($data->policy_payment_datetime); ?>
	<br />


</div>