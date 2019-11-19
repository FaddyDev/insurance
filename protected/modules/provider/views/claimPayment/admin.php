<?php
/* @var $this ClaimPaymentController */
/* @var $model ClaimPayment */

$this->breadcrumbs=array(
	'Claim Payments'=>array('admin'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List ClaimPayment', 'url'=>array('index')),
	array('label'=>'Claims', 'url'=>array('claims/admin')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#claim-payment-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Claim Payments</h1>

<!--<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>-->

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<!--<div class="search-form" style="display:none">
<?php /*$this->renderPartial('_search',array(
	'model'=>$model,
));*/ ?>
</div> search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'claim-payment-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'pk_claim_payment_id',
		'fk_claim_payment_claim_id',
		'claim_payment_receipt_no',
		'claim_payment_amount',
		'claim_payment_status',
		'claim_payment_datetime',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}{update}'
		),
	),
)); ?>
