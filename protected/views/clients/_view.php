<?php
/* @var $this ClientsController */
/* @var $data Clients */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('pk_client_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->pk_client_id), array('view', 'id'=>$data->pk_client_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('client_idno')); ?>:</b>
	<?php echo CHtml::encode($data->client_idno); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('client_fname')); ?>:</b>
	<?php echo CHtml::encode($data->client_fname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('client_lname')); ?>:</b>
	<?php echo CHtml::encode($data->client_lname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('client_email')); ?>:</b>
	<?php echo CHtml::encode($data->client_email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('client_occupation')); ?>:</b>
	<?php echo CHtml::encode($data->client_occupation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('client_dob')); ?>:</b>
	<?php echo CHtml::encode($data->client_dob); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('client_address')); ?>:</b>
	<?php echo CHtml::encode($data->client_address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('client_bank_details')); ?>:</b>
	<?php echo CHtml::encode($data->client_bank_details); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('client_photo')); ?>:</b>
	<?php echo CHtml::encode($data->client_photo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('client_username')); ?>:</b>
	<?php echo CHtml::encode($data->client_username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('client_password')); ?>:</b>
	<?php echo CHtml::encode($data->client_password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_at')); ?>:</b>
	<?php echo CHtml::encode($data->created_at); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updated_at')); ?>:</b>
	<?php echo CHtml::encode($data->updated_at); ?>
	<br />

	*/ ?>

</div>