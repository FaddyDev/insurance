<?php
/* @var $this InvestigatorController */
/* @var $model Investigator */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'investigator-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data',),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<!--<div class="row">
		<?php //echo $form->labelEx($model,'fk_investigator_provider_id'); ?>
		<?php //echo $form->textField($model,'fk_investigator_provider_id'); ?>
		<?php //echo $form->error($model,'fk_investigator_provider_id'); ?>
	</div>-->

	<div class="row">
		<?php echo $form->labelEx($model,'investigator_idno'); ?>
		<?php echo $form->textField($model,'investigator_idno'); ?>
		<?php echo $form->error($model,'investigator_idno'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'investigator_full_name'); ?>
		<?php echo $form->textField($model,'investigator_full_name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'investigator_full_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'investigator_email'); ?>
		<?php echo $form->textField($model,'investigator_email',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'investigator_email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'investigator_photo').'<br>'; 
		$img = Yii::app()->baseUrl.'/images/logos/'.$model->investigator_photo;
          echo '<img src="'.$img.'" width="10%"><br>';
		?>
		<?php echo $form->fileField($model,'investigator_photo',array('size'=>60,'maxlength'=>100,'accept'=>'.jpg,.png,.jpeg')); ?>
		<?php echo $form->error($model,'investigator_photo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'investigator_username'); ?>
		<?php echo $form->textField($model,'investigator_username',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'investigator_username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'investigator_password'); ?>
		<?php echo $form->passwordField($model,'investigator_password',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'investigator_password'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->