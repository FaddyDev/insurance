<?php
/* @var $this ClientPolicyPaymentController */
/* @var $model ClientPolicyPayment */

$this->breadcrumbs=array(
	'Client Policy Payments'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List ClientPolicyPayment', 'url'=>array('index')),
	array('label'=>'Create ClientPolicyPayment', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#client-policy-payment-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Client Policy Payments</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'client-policy-payment-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'pk_policy_payment_id',
		'fk_policy_payment_cp_id',
		'policy_payment_amount',
		'policy_payment_receipt_no',
		'policy_payment_status',
		'policy_payment_datetime',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
