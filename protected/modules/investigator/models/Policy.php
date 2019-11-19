<?php

/**
 * This is the model class for table "policy".
 *
 * The followings are the available columns in table 'policy':
 * @property integer $pk_policy_id
 * @property integer $fk_policy_provider_id
 * @property string $policy_cover_type
 * @property double $policy_price
 * @property integer $policy_period
 * @property string $policy_description
 *
 * The followings are the available model relations:
 * @property ClientPolicies[] $clientPolicies
 * @property Provider $fkPolicyProvider
 */
class Policy extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'policy';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fk_policy_provider_id, policy_cover_type, policy_price, policy_period, policy_description', 'required'),
			array('fk_policy_provider_id, policy_period', 'numerical', 'integerOnly'=>true),
			array('policy_price', 'numerical'),
			array('policy_cover_type', 'length', 'max'=>30),
			array('policy_description', 'length', 'max'=>140),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('pk_policy_id, fk_policy_provider_id, policy_cover_type, policy_price, policy_period, policy_description', 'safe', 'on'=>'search'),
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
			'clientPolicies' => array(self::HAS_MANY, 'ClientPolicies', 'fk_cp_policy_id'),
			'fkPolicyProvider' => array(self::BELONGS_TO, 'Provider', 'fk_policy_provider_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pk_policy_id' => 'Pk Policy',
			'fk_policy_provider_id' => 'Fk Policy Provider',
			'policy_cover_type' => 'Policy Cover Type',
			'policy_price' => 'Policy Price',
			'policy_period' => 'Policy Period',
			'policy_description' => 'Policy Description',
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

		$criteria->compare('pk_policy_id',$this->pk_policy_id);
		$criteria->compare('fk_policy_provider_id',$this->fk_policy_provider_id);
		$criteria->compare('policy_cover_type',$this->policy_cover_type,true);
		$criteria->compare('policy_price',$this->policy_price);
		$criteria->compare('policy_period',$this->policy_period);
		$criteria->compare('policy_description',$this->policy_description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Policy the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
