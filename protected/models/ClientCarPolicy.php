<?php

/**
 * This is the model class for table "client_car_policy".
 *
 * The followings are the available columns in table 'client_car_policy':
 * @property integer $pk_car_id
 * @property integer $fk_cp_id
 * @property string $car_number_plate
 * @property string $car_model
 * @property integer $car_carrying_capacity
 * @property string $car_year_of_manufacture
 * @property string $car_use
 * @property string $car_make
 *
 * The followings are the available model relations:
 * @property ClientCarPolicy $fkCp
 * @property ClientCarPolicy[] $clientCarPolicies
 */
class ClientCarPolicy extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'client_car_policy';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fk_cp_id, car_number_plate, car_model, car_carrying_capacity, car_year_of_manufacture, car_use, car_make', 'required'),
			array('pk_car_id, fk_cp_id, car_carrying_capacity', 'numerical', 'integerOnly'=>true),
			array('car_number_plate', 'length', 'max'=>10),
			array('car_model, car_use, car_make', 'length', 'max'=>20),
			array('car_year_of_manufacture', 'length', 'max'=>4),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('pk_car_id, fk_cp_id, car_number_plate, car_model, car_carrying_capacity, car_year_of_manufacture, car_use, car_make', 'safe', 'on'=>'search'),
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
			'fkClientPolicy' => array(self::HAS_MANY, 'ClientPolicies', 'fk_cp_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pk_car_id' => 'ID',
			'fk_cp_id' => 'Policy ID',
			'car_number_plate' => 'Number Plate',
			'car_model' => 'Model',
			'car_carrying_capacity' => 'Carrying Capacity',
			'car_year_of_manufacture' => 'Year Of Manufacture',
			'car_use' => 'Use',
			'car_make' => 'Make',
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

		$criteria->compare('pk_car_id',$this->pk_car_id);
		$criteria->compare('fk_cp_id',$this->fk_cp_id);
		$criteria->compare('car_number_plate',$this->car_number_plate,true);
		$criteria->compare('car_model',$this->car_model,true);
		$criteria->compare('car_carrying_capacity',$this->car_carrying_capacity);
		$criteria->compare('car_year_of_manufacture',$this->car_year_of_manufacture,true);
		$criteria->compare('car_use',$this->car_use,true);
		$criteria->compare('car_make',$this->car_make,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ClientCarPolicy the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
