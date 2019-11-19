<?php

/**
 * This is the model class for table "client_policies".
 *
 * The followings are the available columns in table 'client_policies':
 * @property integer $pk_cp_id
 * @property integer $fk_cp_client_id
 * @property integer $fk_cp_policy_id
 * @property integer $cp_policy_period
 * @property double $cp_policy_amount
 * @property string $cp_policy_expiry_date
 * @property integer $cp_policy_count
 * @property integer $cp_approval
 * @property string $cp_status
 * @property integer $cp_paid
 *
 * The followings are the available model relations:
 * @property Clients $fkCpClient
 * @property Policy $fkCpPolicy
 */
class ClientPolicies extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'client_policies';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fk_cp_client_id, fk_cp_policy_id, cp_policy_period, cp_policy_expiry_date, cp_policy_count, cp_paid, cp_approval, cp_status', 'required'),
			array('pk_cp_id, fk_cp_client_id, fk_cp_policy_id, cp_policy_period, cp_policy_count', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('pk_cp_id, fk_cp_client_id, fk_cp_policy_id, cp_policy_period, cp_policy_expiry_date, cp_policy_count', 'safe', 'on'=>'search'),
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
			'fkCpClient' => array(self::BELONGS_TO, 'Clients', 'fk_cp_client_id'),
			'fkCpPolicy' => array(self::BELONGS_TO, 'Policy', 'fk_cp_policy_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pk_cp_id' => 'Pk Cp',
			'fk_cp_client_id' => 'Fk Cp Client',
			'fk_cp_policy_id' => 'Fk Cp Policy',
			'cp_policy_period' => 'Cp Policy Period',
			'cp_policy_amount' => 'Amount',
			'cp_policy_expiry_date' => 'Cp Policy Expiry Date',
			'cp_policy_count' => 'Cp Policy Count',
			'cp_status' => 'Status'
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

		$criteria->compare('pk_cp_id',$this->pk_cp_id);
		$criteria->compare('fk_cp_client_id',$this->fk_cp_client_id);
		$criteria->compare('fk_cp_policy_id',$this->fk_cp_policy_id);
		$criteria->compare('cp_policy_period',$this->cp_policy_period);
		$criteria->compare('cp_policy_expiry_date',$this->cp_policy_expiry_date,true);
		$criteria->compare('cp_policy_count',$this->cp_policy_count);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ClientPolicies the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
