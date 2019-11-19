<?php

/**
 * This is the model class for table "claims".
 *
 * The followings are the available columns in table 'claims':
 * @property integer $pk_claim_id
 * @property integer $fk_claim_client_policy_id
 * @property string $claim_info
 * @property string $claim_investigator_report
 * @property string $claim_investigator_post_datetime
 * @property string $claim_post_datetime
 * @property string $claim_final_verdict
 * @property string $claim_final_verdict_post_datetime
 * @property string $claim_status
 *
 * The followings are the available model relations:
 * @property Policy $fkClaimPolicy
 */
class Claims extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'claims';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fk_claim_client_policy_id, claim_info, claim_post_datetime, claim_status', 'required'),
			array('fk_claim_client_policy_id', 'numerical', 'integerOnly'=>true),
			array('claim_info, claim_investigator_report', 'length', 'max'=>140),
			array('claim_final_verdict', 'length', 'max'=>100),
			array('claim_status', 'length', 'max'=>30),
			array('claim_investigator_post_datetime, claim_final_verdict_post_datetime', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('pk_claim_id, fk_claim_client_policy_id, claim_info, claim_investigator_report, claim_investigator_post_datetime, claim_post_datetime, claim_final_verdict, claim_final_verdict_post_datetime, claim_status', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'claimPayments' => array(self::HAS_MANY, 'ClaimPayment', 'fk_claim_payment_claim_id'),
			'fkClaimClientPolicy' => array(self::BELONGS_TO, 'ClientPolicies', 'fk_claim_client_policy_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pk_claim_id' => 'Claim ID',
			'fk_claim_client_policy_id' => 'Policy ID',
			'claim_info' => 'Claim Info',
			'claim_investigator_report' => 'Investigator Report',
			'claim_investigator_post_datetime' => 'Investigator Post Date',
			'claim_post_datetime' => 'Post Date',
			'claim_final_verdict' => 'Final Verdict',
			'claim_final_verdict_post_datetime' => 'Final Verdict Post Date',
			'claim_status' => 'Status',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('pk_claim_id',$this->pk_claim_id);
		//$criteria->compare('fk_claim_client_policy_id',$this->fk_claim_client_policy_id);
		$criteria->compare('fk_policy_provider_id',Yii::app()->getModule("provider")->providerUser->provider_id);
		$criteria->compare('claim_investigator_report',$this->claim_investigator_report,true);
		$criteria->compare('claim_investigator_post_datetime',$this->claim_investigator_post_datetime,true);
		$criteria->compare('claim_post_datetime',$this->claim_post_datetime,true);
		$criteria->compare('claim_final_verdict',$this->claim_final_verdict,true);
		$criteria->compare('claim_final_verdict_post_datetime',$this->claim_final_verdict_post_datetime,true);
		$criteria->compare('claim_status',$this->claim_status);
		$criteria->with=array('fkClaimClientPolicy.fkCpClient','fkClaimClientPolicy.fkCpPolicy');

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Claims the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
