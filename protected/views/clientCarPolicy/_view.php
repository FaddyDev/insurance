<?php
/* @var $this ClientCarPolicyController */
/* @var $data ClientCarPolicy */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('pk_car_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->pk_car_id), array('view', 'id'=>$data->pk_car_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fk_cp_id')); ?>:</b>
	<?php echo CHtml::encode($data->fk_cp_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('car_number_plate')); ?>:</b>
	<?php echo CHtml::encode($data->car_number_plate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('car_model')); ?>:</b>
	<?php echo CHtml::encode($data->car_model); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('car_carrying_capacity')); ?>:</b>
	<?php echo CHtml::encode($data->car_carrying_capacity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('car_year_of_manufacture')); ?>:</b>
	<?php echo CHtml::encode($data->car_year_of_manufacture); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('car_use')); ?>:</b>
	<?php echo CHtml::encode($data->car_use); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('car_make')); ?>:</b>
	<?php echo CHtml::encode($data->car_make); ?>
	<br />

	*/ ?>

</div>