<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class InvestigatorUserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{	
		$user = Investigator::model()->findByAttributes(array('investigator_username'=>$this->username));
		if ($user===null) { // No user found!
	    $this->errorCode=self::ERROR_USERNAME_INVALID;
		} 
		else if ($user->investigator_password !== $this->password) { // Invalid password! crypt($this->password, $user->client_password)
	    $this->errorCode=self::ERROR_PASSWORD_INVALID;
		} 
		else { // Okay!
    		$this->errorCode=self::ERROR_NONE;
	    	$this->setState('investigator_id',$user->pk_investigator_id);
	    	$this->setState('investigator_full_name',$user->investigator_full_name);
	    	$this->setState('username',$user->investigator_username);
	    	$this->setState('investigator_logo',$user->investigator_photo);
	    	$this->setState('investigator_provider_id',$user->fk_investigator_provider_id);
		}
		return !$this->errorCode;

		$identity->authenticate();
		switch($identity->errorCode)
		{
			case InvestigatorUserIdentity::ERROR_NONE:
				$duration=$this->rememberMe ? 3600*24*1 : 0; // 1 day
				Yii::app()->getModule("investigator")->investigatorUser->login($identity,$duration);
				break;
			case InvestigatorUserIdentity::ERROR_USERNAME_INVALID:
				$this->addError('username','Username is incorrect.');
				break;
			default: // InvestigatorUserIdentity::ERROR_PASSWORD_INVALID
				$this->addError('password','Password is incorrect.');
				break;
		}
	}
}