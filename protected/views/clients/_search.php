<?php
/* @var $this ClientsController */
/* @var $model Clients */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'pk_client_id'); ?>
		<?php echo $form->textField($model,'pk_client_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'client_idno'); ?>
		<?php echo $form->textField($model,'client_idno',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'client_fname'); ?>
		<?php echo $form->textField($model,'client_fname',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'client_lname'); ?>
		<?php echo $form->textField($model,'client_lname',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'client_email'); ?>
		<?php echo $form->textField($model,'client_email',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'client_occupation'); ?>
		<?php echo $form->textField($model,'client_occupation',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'client_dob'); ?>
		<?php echo $form->textField($model,'client_dob',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'client_address'); ?>
		<?php echo $form->textField($model,'client_address',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'client_bank_details'); ?>
		<?php echo $form->textField($model,'client_bank_details',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'client_photo'); ?>
		<?php echo $form->textField($model,'client_photo',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'client_username'); ?>
		<?php echo $form->textField($model,'client_username',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created_at'); ?>
		<?php echo $form->textField($model,'created_at'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'updated_at'); ?>
		<?php echo $form->textField($model,'updated_at'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->