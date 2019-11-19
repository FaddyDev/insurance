<?php

class ClaimsController extends Controller
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
				'actions'=>array('create','update','admin','view','delete','selectPolicy'),
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

		/**
	 * Manages all models.
	 */
	public function actionSelectPolicy()
	{
		$model=new ClientPolicies('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ClientPolicies']))
			$model->attributes=$_GET['ClientPolicies'];

		$this->render('selectPolicy',array(
			'clientPolicy'=>$model,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Claims;
		$policyID = Yii::app()->getRequest()->getParam('id');
		$clientPolicy=ClientPolicies::model()->findByPk($policyID);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Claims']))
		{
			$model->attributes=$_POST['Claims'];
			$model->claim_post_datetime = (new DateTime())->format('Y-m-d H:i:s');
			$model->claim_status = 'Pending Investigator Report';
			if($model->save()){				
				$_SESSION['status']='success'; $_SESSION['response']='Claim filed successfully, wait for provider\'s action!'; 
				$this->redirect(array('view','id'=>$model->pk_claim_id));
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'clientPolicy'=>$clientPolicy,
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
		$clientPolicy=ClientPolicies::model()->findByPk($model->fk_claim_client_policy_id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Claims']))
		{
			$model->attributes=$_POST['Claims'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->pk_claim_id));
		}

		$this->render('update',array(
			'model'=>$model,
			'clientPolicy'=>$clientPolicy,
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
		$dataProvider=new CActiveDataProvider('Claims');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Claims('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Claims']))
			$model->attributes=$_GET['Claims'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Claims the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Claims::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Claims $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='claims-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
