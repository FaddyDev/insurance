<?php

/**
 * This is the model class for table "provider".
 *
 * The followings are the available columns in table 'provider':
 * @property integer $pk_provider_id
 * @property string $provider_full_name
 * @property string $provider_email
 * @property string $provider_username
 * @property string $provider_password
 *
 * The followings are the available model relations:
 * @property Investigator[] $investigators
 */
class Provider extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'provider';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('provider_full_name, provider_email, provider_username, provider_password', 'required'),
			array('provider_full_name, provider_password', 'length', 'max'=>100),
			array('provider_email, provider_username', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('pk_provider_id, provider_full_name, provider_email, provider_username, provider_password', 'safe', 'on'=>'search'),
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
			'investigators' => array(self::HAS_MANY, 'Investigator', 'fk_investigator_provider_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pk_provider_id' => 'Pk Provider',
			'provider_full_name' => 'Provider Full Name',
			'provider_email' => 'Provider Email',
			'provider_username' => 'Provider Username',
			'provider_password' => 'Provider Password',
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

		$criteria->compare('pk_provider_id',$this->pk_provider_id);
		$criteria->compare('provider_full_name',$this->provider_full_name,true);
		$criteria->compare('provider_email',$this->provider_email,true);
		$criteria->compare('provider_username',$this->provider_username,true);
		$criteria->compare('provider_password',$this->provider_password,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Provider the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
