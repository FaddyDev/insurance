<?php
/* @var $this ClaimsController */
/* @var $model Claims */

$this->breadcrumbs=array(
	'Claims'=>array('admin'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List Claims', 'url'=>array('index')),
	//array('label'=>'Create Claims', 'url'=>array('create')),
	array('label'=>'Claim Payments', 'url'=>array('claimPayment/admin')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#claims-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Claims</h1>

<!--<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>-->
<p>
	Claims raised by our clients.
</p>

<?php /*echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
));*/ ?>
<!--</div> search-form -->

<?php 
$img_pay = Yii::app()->baseUrl.'/images/pay.jpg';
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'claims-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'pk_claim_id',
		'fk_claim_client_policy_id',
		'claim_post_datetime',
		'claim_investigator_report',
		'claim_investigator_post_datetime',
		'claim_final_verdict',
		array(
			'header'=>'Payment',
		 	'value'=>'$data->claim_final_verdict!==null?CHtml::link( CHtml::image("'.$img_pay.'","",array("title"=>"Pay")),array("claimPayment/create","id"=>$data->pk_claim_id)) : ""',
     		'type'=>'raw',
  		),
		/*
		'claim_final_verdict_post_datetime',
		'claim_status',
		*/
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}{view}',
		),
	),
)); ?>
