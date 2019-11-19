<?php
/* @var $this ProviderController */
/* @var $data Provider */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('pk_provider_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->pk_provider_id), array('view', 'id'=>$data->pk_provider_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('provider_full_name')); ?>:</b>
	<?php echo CHtml::encode($data->provider_full_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('provider_email')); ?>:</b>
	<?php echo CHtml::encode($data->provider_email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('provider_logo')); ?>:</b>
	<?php echo CHtml::encode($data->provider_logo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('provider_username')); ?>:</b>
	<?php echo CHtml::encode($data->provider_username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('provider_password')); ?>:</b>
	<?php echo CHtml::encode($data->provider_password); ?>
	<br />


</div>