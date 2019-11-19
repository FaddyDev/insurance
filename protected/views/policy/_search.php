<?php
/* @var $this PolicyController */
/* @var $model Policy */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'pk_policy_id'); ?>
		<?php echo $form->textField($model,'pk_policy_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fk_policy_provider_id'); ?>
		<?php echo $form->textField($model,'fk_policy_provider_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'policy_cover_type'); ?>
		<?php echo $form->textField($model,'policy_cover_type',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'policy_price'); ?>
		<?php echo $form->textField($model,'policy_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'policy_period'); ?>
		<?php echo $form->textField($model,'policy_period'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'policy_description'); ?>
		<?php echo $form->textField($model,'policy_description',array('size'=>60,'maxlength'=>140)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->