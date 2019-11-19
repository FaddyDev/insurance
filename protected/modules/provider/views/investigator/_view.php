<?php
/* @var $this InvestigatorController */
/* @var $data Investigator */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('pk_investigator_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->pk_investigator_id), array('view', 'id'=>$data->pk_investigator_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fk_investigator_provider_id')); ?>:</b>
	<?php echo CHtml::encode($data->fk_investigator_provider_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('investigator_idno')); ?>:</b>
	<?php echo CHtml::encode($data->investigator_idno); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('investigator_full_name')); ?>:</b>
	<?php echo CHtml::encode($data->investigator_full_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('investigator_email')); ?>:</b>
	<?php echo CHtml::encode($data->investigator_email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('investigator_username')); ?>:</b>
	<?php echo CHtml::encode($data->investigator_username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('investigator_password')); ?>:</b>
	<?php echo CHtml::encode($data->investigator_password); ?>
	<br />


</div>