<?php
/* @var $this ClientPoliciesController */
/* @var $model ClientPolicies */

$this->breadcrumbs=array(
	'Client Policies'=>array('admin'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List ClientPolicies', 'url'=>array('index')),
	//array('label'=>'Create ClientPolicies', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#client-policies-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Client Policies</h1>

<!--<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>-->
<p>
	Clients holding policies provided by you.
</p>

<?php /*echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
));*/ ?>
<!--</div> search-form -->

<?php 
$img_approve = Yii::app()->baseUrl.'/images/check.png';
$img_reject = Yii::app()->baseUrl.'/images/cancel.png';

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'client-policies-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'pk_cp_id',
		array(
			'header'=>'#',
			'value'=>'CHtml::label($row+1+($this->grid->dataProvider->pagination->currentPage
			* $this->grid->dataProvider->pagination->pageSize),"",array("size" =>2))',
			'type'=>'raw',
			),
		//'fk_cp_client_id',
		array(
			'name'=>'fk_cp_client_id',
			'value'=>'$data->fkCpClient->client_fname',
			'type'=>'raw',
			),
		array(
			'name'=>'fk_cp_client_id',
			'value'=>'$data->fkCpClient->client_lname',
			'type'=>'raw',
			),
		//'fk_cp_policy_id',
		array(
			'name'=>'fk_cp_policy_id',
			'value'=>'$data->fkCpPolicy->policy_cover_type',
			'type'=>'raw',
			),
		'cp_policy_period',
		'cp_policy_expiry_date',
		'cp_policy_count',
		'cp_status',
		array(
			'header'=>'Payment',
		 	'value'=>'$data->cp_paid==1?"Paid" : "Not Paid"',
     		'type'=>'raw',
  		),
		array(
			'header'=>'Approve',
		 	'value'=>'$data->cp_approval==0?CHtml::link( CHtml::image("'.$img_approve.'","",array("title"=>"Aprove")),array("clientPolicies/update","id"=>$data->pk_cp_id,"verd"=>1)) : ""',
     		'type'=>'raw',
  		),
		array(
			'header'=>'Reject',
		 	'value'=>'$data->cp_approval==0?CHtml::link( CHtml::image("'.$img_reject.'","",array("title"=>"Reject")),array("clientPolicies/update","id"=>$data->pk_cp_id,"verd"=>2)) : ""',
     		'type'=>'raw',
  		),
		/*array(
			'class'=>'CButtonColumn',
		),*/
	),
)); ?>
