<?php
/* @var $this ClientCarPolicyController */
/* @var $model ClientCarPolicy */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'client-car-policy-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<!--<div class="row">
		<?php //echo $form->labelEx($model,'pk_car_id'); ?>
		<?php //echo $form->textField($model,'pk_car_id'); ?>
		<?php //echo $form->error($model,'pk_car_id'); ?>
	</div>-->

	<?php 

	if(!isset($fkPolicy)){$fkPolicy = $model->fk_cp_id;}
	
	echo $form->hiddenField($model,'fk_cp_id',array('value'=>$fkPolicy)); ?>
	<div class="row">
		<?php //echo $form->labelEx($model,'fk_cp_id'); ?>
		<?php //echo $form->textField($model,'fk_cp_id'); ?>
		<?php //echo $form->error($model,'fk_cp_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'car_number_plate'); ?>
		<?php echo $form->textField($model,'car_number_plate',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'car_number_plate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'car_model'); ?>
		<?php echo $form->textField($model,'car_model',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'car_model'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'car_carrying_capacity'); ?>
		<?php echo $form->textField($model,'car_carrying_capacity'); ?>
		<?php echo $form->error($model,'car_carrying_capacity'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'car_year_of_manufacture'); ?>
		<?php echo $form->textField($model,'car_year_of_manufacture',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'car_year_of_manufacture'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'car_use'); ?>
		<?php echo $form->textField($model,'car_use',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'car_use'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'car_make'); ?>
		<?php echo $form->textField($model,'car_make',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'car_make'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'car_value'); ?>
		<?php echo $form->textField($model,'car_value',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'car_value'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->