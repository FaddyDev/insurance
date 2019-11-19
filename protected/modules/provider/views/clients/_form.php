<?php
/* @var $this ClientsController */
/* @var $model Clients */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'clients-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'client_idno'); ?>
		<?php echo $form->textField($model,'client_idno',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'client_idno'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'client_fname'); ?>
		<?php echo $form->textField($model,'client_fname',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'client_fname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'client_lname'); ?>
		<?php echo $form->textField($model,'client_lname',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'client_lname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'client_email'); ?>
		<?php echo $form->textField($model,'client_email',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'client_email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'client_occupation'); ?>
		<?php echo $form->textField($model,'client_occupation',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'client_occupation'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'client_dob'); ?>
		<?php echo $form->textField($model,'client_dob',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'client_dob'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'client_address'); ?>
		<?php echo $form->textField($model,'client_address',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'client_address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'client_bank_details'); ?>
		<?php echo $form->textField($model,'client_bank_details',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'client_bank_details'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'client_photo'); ?>
		<?php echo $form->textField($model,'client_photo',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'client_photo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'client_username'); ?>
		<?php echo $form->textField($model,'client_username',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'client_username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'client_password'); ?>
		<?php echo $form->textField($model,'client_password',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'client_password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created_at'); ?>
		<?php echo $form->textField($model,'created_at'); ?>
		<?php echo $form->error($model,'created_at'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'updated_at'); ?>
		<?php echo $form->textField($model,'updated_at'); ?>
		<?php echo $form->error($model,'updated_at'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->