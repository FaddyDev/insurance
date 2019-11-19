<?php
/* @var $this ProviderController */
/* @var $model Provider */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'pk_provider_id'); ?>
		<?php echo $form->textField($model,'pk_provider_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'provider_full_name'); ?>
		<?php echo $form->textField($model,'provider_full_name',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'provider_email'); ?>
		<?php echo $form->textField($model,'provider_email',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'provider_logo'); ?>
		<?php echo $form->textField($model,'provider_logo',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'provider_username'); ?>
		<?php echo $form->textField($model,'provider_username',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->