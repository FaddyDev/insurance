<?php

/**
 * This is the model class for table "investigator".
 *
 * The followings are the available columns in table 'investigator':
 * @property integer $pk_investigator_id
 * @property integer $fk_investigator_provider_id
 * @property integer $investigator_idno
 * @property string $investigator_full_name
 * @property string $investigator_email
 * @property string $investigator_photo
 * @property string $investigator_username
 * @property string $investigator_password
 *
 * The followings are the available model relations:
 * @property Provider $fkInvestigatorProvider
 */
class Investigator extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'investigator';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fk_investigator_provider_id, investigator_idno, investigator_full_name, investigator_email, investigator_username, investigator_password', 'required'),
			array('fk_investigator_provider_id, investigator_idno', 'numerical', 'integerOnly'=>true),
			array('investigator_full_name, investigator_photo, investigator_password', 'length', 'max'=>100),
			array('investigator_email', 'length', 'max'=>50),
			array('investigator_username', 'length', 'max'=>20),
			array('provider_logo','file','types'=>'jpg,jpeg,png'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('pk_investigator_id, fk_investigator_provider_id, investigator_idno, investigator_full_name, investigator_email, investigator_photo, investigator_username, investigator_password', 'safe', 'on'=>'search'),
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
			'fkInvestigatorProvider' => array(self::BELONGS_TO, 'Provider', 'fk_investigator_provider_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pk_investigator_id' => 'ID',
			'fk_investigator_provider_id' => 'Provider',
			'investigator_idno' => 'Idno',
			'investigator_full_name' => 'Full Name',
			'investigator_email' => 'Email',
			'investigator_photo' => 'Photo',
			'investigator_username' => 'Username',
			'investigator_password' => 'Password',
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

		$criteria->compare('pk_investigator_id',$this->pk_investigator_id);
		$criteria->compare('fk_investigator_provider_id',Yii::app()->getModule("investigator")->investigatorUser->investigator_provider_id);
		$criteria->compare('investigator_idno',$this->investigator_idno);
		$criteria->compare('investigator_full_name',$this->investigator_full_name,true);
		$criteria->compare('investigator_email',$this->investigator_email,true);
		$criteria->compare('investigator_photo',$this->investigator_photo,true);
		$criteria->compare('investigator_username',$this->investigator_username,true);
		$criteria->compare('investigator_password',$this->investigator_password,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Investigator the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
