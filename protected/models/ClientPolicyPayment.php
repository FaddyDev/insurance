<?php

/**
 * This is the model class for table "client_policy_payment".
 *
 * The followings are the available columns in table 'client_policy_payment':
 * @property integer $pk_policy_payment_id
 * @property integer $fk_policy_payment_cp_id
 * @property double $policy_payment_amount
 * @property string $policy_payment_receipt_pic
 * @property string $policy_payment_receipt_no
 * @property string $policy_payment_status
 * @property string $policy_payment_datetime
 *
 * The followings are the available model relations:
 * @property ClientPolicies $fkPolicyPaymentCp
 */
class ClientPolicyPayment extends CActiveRecord
{
	public $cover;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'client_policy_payment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fk_policy_payment_cp_id, policy_payment_amount, policy_payment_receipt_no, policy_payment_status, policy_payment_datetime', 'required'),
			array('fk_policy_payment_cp_id', 'numerical', 'integerOnly'=>true),
			array('policy_payment_amount', 'numerical'),
			array('policy_payment_receipt_no', 'length', 'max'=>20),
			array('policy_payment_status', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('pk_policy_payment_id, fk_policy_payment_cp_id, policy_payment_amount, policy_payment_receipt_no, policy_payment_status, policy_payment_datetime,cover', 'safe', 'on'=>'search'),
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
			'fkPolicyPaymentCp' => array(self::BELONGS_TO, 'ClientPolicies', 'fk_policy_payment_cp_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pk_policy_payment_id' => 'Pay ID',
			'fk_policy_payment_cp_id' => 'Policy ID',
			'policy_payment_amount' => 'Amount',
			'policy_payment_receipt_no' => 'Receipt No',
			'policy_payment_status' => 'Status',
			'policy_payment_datetime' => 'Datetime',
			'cover'=>'Cover',
			'policy_payment_receipt_pic'=>'Receipt Pic',
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

		$criteria->compare('pk_policy_payment_id',$this->pk_policy_payment_id);
		$criteria->compare('fk_policy_payment_cp_id',$this->fk_policy_payment_cp_id);
		$criteria->compare('fk_cp_client_id',Yii::app()->user->client_id);
		$criteria->compare('policy_cover_type',$this->cover,true);
		$criteria->compare('policy_payment_amount',$this->policy_payment_amount);
		$criteria->compare('policy_payment_receipt_no',$this->policy_payment_receipt_no,true);
		$criteria->compare('policy_payment_status',$this->policy_payment_status,true);
		$criteria->compare('policy_payment_datetime',$this->policy_payment_datetime,true);
		$criteria->with = array('fkPolicyPaymentCp.fkCpPolicy');

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ClientPolicyPayment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
