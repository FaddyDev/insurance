<?php
/* @var $this ClaimsController */
/* @var $data Claims */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('pk_claim_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->pk_claim_id), array('view', 'id'=>$data->pk_claim_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fk_claim_client_policy_id')); ?>:</b>
	<?php echo CHtml::encode($data->fk_claim_client_policy_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('claim_investigator_report')); ?>:</b>
	<?php echo CHtml::encode($data->claim_investigator_report); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('claim_investigator_post_datetime')); ?>:</b>
	<?php echo CHtml::encode($data->claim_investigator_post_datetime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('claim_post_datetime')); ?>:</b>
	<?php echo CHtml::encode($data->claim_post_datetime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('claim_final_verdict')); ?>:</b>
	<?php echo CHtml::encode($data->claim_final_verdict); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('claim_final_verdict_post_datetime')); ?>:</b>
	<?php echo CHtml::encode($data->claim_final_verdict_post_datetime); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('claim_status')); ?>:</b>
	<?php echo CHtml::encode($data->claim_status); ?>
	<br />

	*/ ?>

</div>