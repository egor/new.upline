<?php

/**
 * This is the model class for table "event_type".
 *
 * The followings are the available columns in table 'event_type':
 * @property integer $event_type_id
 * @property string $name
 * @property string $description
 * @property string $pic
 * @property integer $color
 * @property string $language
 */
class EventType extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return EventType the static model class
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
		return 'event_type';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('name, description, pic, color, language', 'required'),
			//array('color', 'numerical', 'integerOnly'=>true),
                        array('position', 'numerical', 'integerOnly'=>true),
			array('name, description, pic', 'length', 'max'=>255),
			array('language', 'length', 'max'=>3),
                        array('color', 'length', 'max'=>6),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('position, event_type_id, name, description, pic, color, language', 'safe', 'on'=>'search'),
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
			'event_type_id' => 'Event Type',
			'name' => 'Название',
			'description' => 'Описание',
			'pic' => 'Картинка',
			'color' => 'Цвет фона',
			'language' => 'Язык',
                        'position' => 'Позиция вывода',
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

		$criteria->compare('event_type_id',$this->event_type_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('pic',$this->pic,true);
		$criteria->compare('color',$this->color);
		$criteria->compare('language',$this->language,true);
                $criteria->compare('position',$this->position,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}