<?php

/**
 * This is the model class for table "claim_payment".
 *
 * The followings are the available columns in table 'claim_payment':
 * @property integer $pk_claim_payment_id
 * @property integer $fk_claim_payment_claim_id
 * @property string $claim_payment_receipt_no
 * @property double $claim_payment_amount
 * @property string $claim_payment_status
 * @property string $claim_payment_datetime
 *
 * The followings are the available model relations:
 * @property Claims $fkClaimPaymentClaim
 */
class ClaimPayment extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'claim_payment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fk_claim_payment_claim_id, claim_payment_receipt_no, claim_payment_amount, claim_payment_status, claim_payment_datetime', 'required'),
			array('fk_claim_payment_claim_id', 'numerical', 'integerOnly'=>true),
			array('claim_payment_amount', 'numerical'),
			array('claim_payment_receipt_no, claim_payment_status', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('pk_claim_payment_id, fk_claim_payment_claim_id, claim_payment_receipt_no, claim_payment_amount, claim_payment_status, claim_payment_datetime', 'safe', 'on'=>'search'),
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
			'fkClaimPaymentClaim' => array(self::BELONGS_TO, 'Claims', 'fk_claim_payment_claim_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pk_claim_payment_id' => 'Payment ID',
			'fk_claim_payment_claim_id' => 'Claim ID',
			'claim_payment_receipt_no' => 'Receipt No',
			'claim_payment_amount' => 'Amount',
			'claim_payment_status' => 'Payment Status',
			'claim_payment_datetime' => 'Payment Datetime',
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

		$criteria->compare('pk_claim_payment_id',$this->pk_claim_payment_id);
		$criteria->compare('fk_claim_payment_claim_id',$this->fk_claim_payment_claim_id);
		$criteria->compare('fk_policy_provider_id',Yii::app()->getModule("provider")->providerUser->provider_id);
		$criteria->compare('claim_payment_receipt_no',$this->claim_payment_receipt_no,true);
		$criteria->compare('claim_payment_amount',$this->claim_payment_amount);
		$criteria->compare('claim_payment_status',$this->claim_payment_status,true);
		$criteria->compare('claim_payment_datetime',$this->claim_payment_datetime,true);
		$criteria->with=array('fkClaimPaymentClaim.fkClaimClientPolicy.fkCpClient','fkClaimPaymentClaim.fkClaimClientPolicy.fkCpPolicy');

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ClaimPayment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
