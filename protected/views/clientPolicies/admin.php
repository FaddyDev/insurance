<?php
/* @var $this ClientPoliciesController */
/* @var $model ClientPolicies */

$this->breadcrumbs=array(
	'Client Policies'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List ClientPolicies', 'url'=>array('index')),
	//array('label'=>'Create ClientPolicies', 'url'=>array('create')),
	array('label'=>'Buy Policy', 'url'=>array('policy/admin')),
	array('label'=>'Policy Payments', 'url'=>array('clientPolicyPayment/admin')),
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

<h1>My Policies</h1>

<!--<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>-->
<p>
	These are the policies you've purchased from various providers. Click the icon under the 
	<em>more</em> column to view and update car details.
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
$img_pay = Yii::app()->baseUrl.'/images/pay.jpg';
$img_view = Yii::app()->baseUrl.'/images/view.png';
$img_select = Yii::app()->baseUrl.'/images/select.png';
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'client-policies-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
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
		array(
			'header'=>'More',
		 	'value'=>'$data->fkCpPolicy->policy_cover_type=="Car"?CHtml::link( CHtml::image("'.$img_view.'","",array("title"=>"car details")),array("clientCarPolicy/viewCar","id"=>$data->pk_cp_id)) : ""',
     		'type'=>'raw',
  		),
		array(
			'header'=>'Payment',
		 	'value'=>'$data->cp_approval==1? $data->cp_paid==0?CHtml::link( CHtml::image("'.$img_pay.'","",array("title"=>"Pay")),array("clientPolicyPayment/create","id"=>$data->pk_cp_id)) : "  Paid" : ""',
     		'type'=>'raw',
  		),
		array(
			'header'=>'Claim',
		 	'value'=>'$data->cp_status=="Active"?CHtml::link( CHtml::image("'.$img_select.'","",array("title"=>"file claim")),array("claims/create","id"=>$data->pk_cp_id)) : ""',
     		'type'=>'raw',
  		),
		'cp_status',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
