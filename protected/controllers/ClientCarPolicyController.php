<?php

class ClientCarPolicyController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','admin','view','viewCar','delete'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
	public function actionViewCar()
	{
		$clientPolicyID = Yii::app()->getRequest()->getParam('id');
		$model = ClientCarPolicy::model()->findByAttributes(array('fk_cp_id'=>$clientPolicyID));
		if($model == NULL)
		{
			//go to create
			$this->redirect(array('create','clientPolicyID'=>$clientPolicyID));
		}
		else{
			//records exist, go to admin
			$this->redirect(array('admin','id'=>$clientPolicyID));
		}
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new ClientCarPolicy;
		$clientPolicyID = Yii::app()->getRequest()->getParam('clientPolicyID');

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ClientCarPolicy']))
		{
			$model->attributes=$_POST['ClientCarPolicy'];
			$theClientPolicy = ClientPolicies::model()->findByPk($clientPolicyID);
			$policy_price = $theClientPolicy->fkCpPolicy->policy_price;//%
			$policy_period = $theClientPolicy->fkCpPolicy->policy_period;//months
			$cp_period = $theClientPolicy->cp_policy_period;//months
			$policy_count = $theClientPolicy->cp_policy_count;
			$car_value = $_POST['ClientCarPolicy']['car_value'];
			$amount = (round( (( (($policy_price*$car_value)/100)/$policy_period )*$cp_period) ,2))*$policy_count;
			$prev_amount = $theClientPolicy->cp_policy_amount;
			$theClientPolicy->cp_policy_amount = ($prev_amount+$amount);
			$theClientPolicy->save();
			if($model->save())
				$this->redirect(array('view','id'=>$model->pk_car_id));
		}

		$this->render('create',array(
			'model'=>$model,
			'fkPolicy'=>$clientPolicyID,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ClientCarPolicy']))
		{
			$model->attributes=$_POST['ClientCarPolicy'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->pk_car_id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('ClientCarPolicy');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$clientPolicyID = Yii::app()->getRequest()->getParam('id');
		$model=new ClientCarPolicy('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ClientCarPolicy']))
			$model->attributes=$_GET['ClientCarPolicy'];

		$this->render('admin',array(
			'model'=>$model,
			'clientPolicyID'=>$clientPolicyID,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return ClientCarPolicy the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=ClientCarPolicy::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param ClientCarPolicy $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='client-car-policy-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
