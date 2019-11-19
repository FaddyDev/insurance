<?php
/* @var $this ClientCarPolicyController */
/* @var $model ClientCarPolicy */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'pk_car_id'); ?>
		<?php echo $form->textField($model,'pk_car_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fk_cp_id'); ?>
		<?php echo $form->textField($model,'fk_cp_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'car_number_plate'); ?>
		<?php echo $form->textField($model,'car_number_plate',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'car_model'); ?>
		<?php echo $form->textField($model,'car_model',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'car_carrying_capacity'); ?>
		<?php echo $form->textField($model,'car_carrying_capacity'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'car_year_of_manufacture'); ?>
		<?php echo $form->textField($model,'car_year_of_manufacture',array('size'=>4,'maxlength'=>4)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'car_use'); ?>
		<?php echo $form->textField($model,'car_use',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'car_make'); ?>
		<?php echo $form->textField($model,'car_make',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->