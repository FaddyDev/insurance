<?php
/* @var $this PolicyController */
/* @var $data Policy */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('pk_policy_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->pk_policy_id), array('view', 'id'=>$data->pk_policy_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fk_policy_provider_id')); ?>:</b>
	<?php echo CHtml::encode($data->fkPolicyProvider->provider_full_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('policy_cover_type')); ?>:</b>
	<?php echo CHtml::encode($data->policy_cover_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('policy_price')); ?>:</b>
	<?php echo CHtml::encode($data->policy_price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('policy_period')); ?>:</b>
	<?php echo CHtml::encode($data->policy_period); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('policy_description')); ?>:</b>
	<?php echo CHtml::encode($data->policy_description); ?>
	<br />


</div>