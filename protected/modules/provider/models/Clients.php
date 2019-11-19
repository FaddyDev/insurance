<?php

/**
 * This is the model class for table "clients".
 *
 * The followings are the available columns in table 'clients':
 * @property integer $pk_client_id
 * @property string $client_idno
 * @property string $client_fname
 * @property string $client_lname
 * @property string $client_email
 * @property string $client_occupation
 * @property string $client_dob
 * @property string $client_address
 * @property string $client_bank_details
 * @property string $client_photo
 * @property string $client_username
 * @property string $client_password
 * @property string $created_at
 * @property string $updated_at
 *
 * The followings are the available model relations:
 * @property ClientPolicies[] $clientPolicies
 */
class Clients extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'clients';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('client_idno, client_fname, client_lname, client_email, client_occupation, client_dob, client_address, client_bank_details, client_username, client_password', 'required'),
			array('client_idno', 'length', 'max'=>8),
			array('client_fname, client_lname, client_dob, client_username', 'length', 'max'=>20),
			array('client_email, client_occupation', 'length', 'max'=>50),
			array('client_address', 'length', 'max'=>30),
			array('client_bank_details, client_photo, client_password', 'length', 'max'=>100),
			array('created_at, updated_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('pk_client_id, client_idno, client_fname, client_lname, client_email, client_occupation, client_dob, client_address, client_bank_details, client_photo, client_username, client_password, created_at, updated_at', 'safe', 'on'=>'search'),
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
			'clientPolicies' => array(self::HAS_MANY, 'ClientPolicies', 'fk_cp_client_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pk_client_id' => 'ID',
			'client_idno' => 'Idno',
			'client_fname' => 'First Name',
			'client_lname' => 'Last Name',
			'client_email' => 'Email',
			'client_occupation' => 'Occupation',
			'client_dob' => 'Date of Birth',
			'client_address' => 'Home Address',
			'client_bank_details' => 'Bank Details',
			'client_photo' => 'Photo',
			'client_username' => 'Username',
			'client_password' => 'Password',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
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

		$criteria->compare('pk_client_id',$this->pk_client_id);
		$criteria->compare('client_idno',$this->client_idno,true);
		$criteria->compare('client_fname',$this->client_fname,true);
		$criteria->compare('client_lname',$this->client_lname,true);
		$criteria->compare('client_email',$this->client_email,true);
		$criteria->compare('client_occupation',$this->client_occupation,true);
		$criteria->compare('client_dob',$this->client_dob,true);
		$criteria->compare('client_address',$this->client_address,true);
		$criteria->compare('client_bank_details',$this->client_bank_details,true);
		$criteria->compare('client_photo',$this->client_photo,true);
		$criteria->compare('client_username',$this->client_username,true);
		$criteria->compare('client_password',$this->client_password,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('updated_at',$this->updated_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Clients the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
