<?php

class ProviderModule extends CWebModule
{
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'provider.models.*',
			'provider.components.*',
		));
		Yii::app()->theme = 'redruby'; 

		$this->setComponents(array(
            'errorHandler' => array(
                'errorAction' => 'provider/default/error'),
            'providerUser' => array(
                'class' => 'CWebUser', 
                'stateKeyPrefix' => '_userProvider',             
                'loginUrl' => Yii::app()->createUrl('provider/default/login'),
				'allowAutoLogin'=>true,
			),

			'request' => array(
				'baseUrl' => Yii::app()->createUrl('provider/default/index'),
			),
        ));

		//Yii::app()->user->setStateKeyPrefix('_provider');
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{

			if (Yii::app()->user->returnURL == Yii::app()->getModule("provider")->providerUser->returnUrl || 
			Yii::app()->user->returnURL == Yii::app()->createUrl('provider/clients/create')) {
				Yii::app()->getModule("provider")->providerUser->returnUrl=Yii::app()->createUrl('provider/default/index');
			}
			// this method is called before any module controller action is performed
			// you may place customized code here
			$route = $controller->id . '/' . $action->id;
           // echo $route;
            $publicPages = array(
                'default/login',
                'default/error',
                'provider/create',
            );

			if (Yii::app()->getModule('provider')->providerUser->isGuest && !in_array($route, $publicPages)){ 
                Yii::app()->getModule('provider')->providerUser->loginRequired();                
            }
            else
                return true;
	  
			return true;
		}
		else
			return false;
	}
}
