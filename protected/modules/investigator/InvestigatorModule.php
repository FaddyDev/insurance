<?php

class InvestigatorModule extends CWebModule
{
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'investigator.models.*',
			'investigator.components.*',
		));
		Yii::app()->theme = 'jumpforjoy'; 

		$this->setComponents(array(
            'errorHandler' => array(
                'errorAction' => 'investigator/default/error'),
            'investigatorUser' => array(
                'class' => 'CWebUser', 
                'stateKeyPrefix' => '_userinvestigator',             
                'loginUrl' => Yii::app()->createUrl('investigator/default/login'),
				'allowAutoLogin'=>true,
			),

			'request' => array(
				'baseUrl' => Yii::app()->createUrl('investigator/default/index'),
			),
        ));

		//Yii::app()->user->setStateKeyPrefix('_investigator');
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{

			if (Yii::app()->user->returnURL == Yii::app()->getModule("investigator")->investigatorUser->returnUrl || 
			Yii::app()->user->returnURL == Yii::app()->createUrl('investigator/clients/create')) {
				Yii::app()->getModule("investigator")->investigatorUser->returnUrl=Yii::app()->createUrl('investigator/default/index');
			}
			// this method is called before any module controller action is performed
			// you may place customized code here
			$route = $controller->id . '/' . $action->id;
           // echo $route;
            $publicPages = array(
                'default/login',
                'default/error',
            );

			if (Yii::app()->getModule('investigator')->investigatorUser->isGuest && !in_array($route, $publicPages)){ 
                Yii::app()->getModule('investigator')->investigatorUser->loginRequired();                
            }
            else
                return true;
	  
			return true;
		}
		else
			return false;
	}
}
