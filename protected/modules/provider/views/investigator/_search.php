<?php
/* @var $this InvestigatorController */
/* @var $model Investigator */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'pk_investigator_id'); ?>
		<?php echo $form->textField($model,'pk_investigator_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fk_investigator_provider_id'); ?>
		<?php echo $form->textField($model,'fk_investigator_provider_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'investigator_idno'); ?>
		<?php echo $form->textField($model,'investigator_idno'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'investigator_full_name'); ?>
		<?php echo $form->textField($model,'investigator_full_name',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'investigator_email'); ?>
		<?php echo $form->textField($model,'investigator_email',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'investigator_username'); ?>
		<?php echo $form->textField($model,'investigator_username',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->