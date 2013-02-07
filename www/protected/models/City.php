<?php

/**
 * This is the model class for table "city".
 *
 * The followings are the available columns in table 'city':
 * @property integer $city_id
 * @property integer $position
 * @property integer $country_id
 * @property string $name_ru
 * @property string $name_en
 * @property string $name_ua
 * @property string $name_fr
 */
class City extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return City the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'city';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('city_id, position, country_id, name_ru, name_en, name_ua, name_fr', 'required'),
			array('city_id, position, country_id', 'numerical', 'integerOnly'=>true),
			array('name_ru, name_en, name_ua, name_fr', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('city_id, position, country_id, name_ru, name_en, name_ua, name_fr', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'city_id' => 'City',
			'position' => 'Position',
			'country_id' => 'Country',
			'name_ru' => 'Name Ru',
			'name_en' => 'Name En',
			'name_ua' => 'Name Ua',
			'name_fr' => 'Name Fr',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('city_id',$this->city_id);
		$criteria->compare('position',$this->position);
		$criteria->compare('country_id',$this->country_id);
		$criteria->compare('name_ru',$this->name_ru,true);
		$criteria->compare('name_en',$this->name_en,true);
		$criteria->compare('name_ua',$this->name_ua,true);
		$criteria->compare('name_fr',$this->name_fr,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}