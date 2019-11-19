<?php
/* @var $this PolicyController */
/* @var $model Policy */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'policy-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'fk_policy_provider_id'); ?>
		<?php echo $form->textField($model,'fk_policy_provider_id'); ?>
		<?php echo $form->error($model,'fk_policy_provider_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'policy_cover_type'); ?>
		<?php echo $form->textField($model,'policy_cover_type',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'policy_cover_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'policy_price'); ?>
		<?php echo $form->textField($model,'policy_price'); ?>
		<?php echo $form->error($model,'policy_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'policy_period'); ?>
		<?php echo $form->textField($model,'policy_period'); ?>
		<?php echo $form->error($model,'policy_period'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'policy_description'); ?>
		<?php echo $form->textField($model,'policy_description',array('size'=>60,'maxlength'=>140)); ?>
		<?php echo $form->error($model,'policy_description'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->