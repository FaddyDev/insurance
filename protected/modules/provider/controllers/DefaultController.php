<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		$model = Provider::model()->findByPk(Yii::app()->getModule("provider")->providerUser->provider_id);
		$this->render('index',array('model'=>$model));
	}
	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->getModule("provider")->providerUser->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}
	
	public function actionLogout() {
        //Yii::app()->user->logout(false);
        Yii::app()->getModule("provider")->providerUser->logout();
        $this->redirect(Yii::app()->getModule('provider')->providerUser->loginUrl);
    }
}