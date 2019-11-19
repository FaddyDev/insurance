<?php
/* @var $this ClientPoliciesController */
/* @var $data ClientPolicies */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('pk_cp_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->pk_cp_id), array('view', 'id'=>$data->pk_cp_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fk_cp_client_id')); ?>:</b>
	<?php echo CHtml::encode($data->fk_cp_client_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fk_cp_policy_id')); ?>:</b>
	<?php echo CHtml::encode($data->fk_cp_policy_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cp_policy_period')); ?>:</b>
	<?php echo CHtml::encode($data->cp_policy_period); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cp_policy_expiry_date')); ?>:</b>
	<?php echo CHtml::encode($data->cp_policy_expiry_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cp_policy_count')); ?>:</b>
	<?php echo CHtml::encode($data->cp_policy_count); ?>
	<br />


</div>