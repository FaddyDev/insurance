<?php
/* @var $this ClaimPaymentController */
/* @var $data ClaimPayment */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('pk_claim_payment_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->pk_claim_payment_id), array('view', 'id'=>$data->pk_claim_payment_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fk_claim_payment_claim_id')); ?>:</b>
	<?php echo CHtml::encode($data->fk_claim_payment_claim_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('claim_payment_receipt_no')); ?>:</b>
	<?php echo CHtml::encode($data->claim_payment_receipt_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('claim_payment_amount')); ?>:</b>
	<?php echo CHtml::encode($data->claim_payment_amount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('claim_payment_status')); ?>:</b>
	<?php echo CHtml::encode($data->claim_payment_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('claim_payment_datetime')); ?>:</b>
	<?php echo CHtml::encode($data->claim_payment_datetime); ?>
	<br />


</div>