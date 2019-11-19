<?php
/* @var $this ClientPoliciesController */
/* @var $model ClientPolicies */

$this->breadcrumbs=array(
	'Client Policies'=>array('admin'),
	'Select',
);

$this->menu=array(
	//array('label'=>'List ClientPolicies', 'url'=>array('index')),
	//array('label'=>'Create ClientPolicies', 'url'=>array('create')),
	array('label'=>'Buy Policy', 'url'=>array('policy/admin')),
	array('label'=>'Policy Payments', 'url'=>array('clientPolicyPayment/admin')),
	array('label'=>'My Claims', 'url'=>array('claims/admin')),
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

<h1>Select Policy</h1>

<!--<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>-->
<p>
	Select policy to make claim (Only active policies).
</p>
<?php
if(isset($_SESSION['status']) && isset($_SESSION['response'])){
	$status = $_SESSION['status']; $response = $_SESSION['response'];
	if($status == 'success'){
		echo '<p class="alert alert-success">'.$response.'</p>';
	}
	else{
		echo '<p class="alert alert-warning">'.$response.'</p>';
	}
	unset($_SESSION['status'],$_SESSION['response']);
}
?>

<?php /*echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
));*/ ?>
<!--</div> search-form -->

<?php 
$img_select = Yii::app()->baseUrl.'/images/select.png';
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'client-policies-grid',
	'dataProvider'=>$clientPolicy->searchActive(),
	'filter'=>$clientPolicy,
	'columns'=>array(
		'pk_cp_id',
		//'fk_cp_client_id',
		//'fk_cp_policy_id',
		array(
			'name'=>'fk_cp_policy_id',
			'value'=>'$data->fkCpPolicy->policy_cover_type',
			'type'=>'raw',
			),
		//'cp_policy_period',
		array(
			'name'=>'cp_policy_period',
			'header'=>'Period (months)',
			'value'=>'$data->cp_policy_period',
			),
		//'cp_policy_amount',
		array(
			'name'=>'cp_policy_amount',
			'header'=>'Amount (Ksh)',
			'value'=>'$data->cp_policy_amount',
			),
		'cp_policy_expiry_date',
		'cp_policy_count',
		'cp_status',
		array(
			'header'=>'Select',
		 	'value'=>'CHtml::link( CHtml::image("'.$img_select.'","",array("title"=>"select policy")),array("claims/create","id"=>$data->pk_cp_id))',
     		'type'=>'raw',
  		),
	),
)); ?>
