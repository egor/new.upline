<?php

/**
 * This is the model class for table "calendar".
 *
 * The followings are the available columns in table 'calendar':
 * @property integer $calendar_id
 * @property string $menu_name
 * @property string $h1
 * @property integer $type
 * @property string $short_text
 * @property integer $start_date
 * @property integer $end_date
 * @property integer $position
 * @property integer $visibility
 * @property string $link_to_event
 * @property integer $country
 * @property integer $city
 * @property integer $author
 * @property integer $visibility_from_user
 * @property integer $visibility_from_diamond
 * @property integer $visibility_from_emerald
 * @property integer $visibility_from_platinum
 * @property string $language
 */
class Calendar extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Calendar the static model class
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
		return 'calendar';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('menu_name, h1, type, short_text, start_date, end_date, position, visibility, link_to_event, country, city, author, visibility_from_user, visibility_from_diamond, visibility_from_emerald, visibility_from_platinum, language', 'required'),
			array('type, start_date, end_date, position, visibility, country, city, author, visibility_from_user, visibility_from_diamond, visibility_from_emerald, visibility_from_platinum', 'numerical', 'integerOnly'=>true),
			array('menu_name, h1, link_to_event', 'length', 'max'=>255),
			array('language', 'length', 'max'=>3),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('calendar_id, menu_name, h1, type, short_text, start_date, end_date, position, visibility, link_to_event, country, city, author, visibility_from_user, visibility_from_diamond, visibility_from_emerald, visibility_from_platinum, language', 'safe', 'on'=>'search'),
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
			'calendar_id' => 'Calendar',
			'menu_name' => 'Краткое название',
			'h1' => 'Полное название',
			'type' => 'Тип',
			'short_text' => 'Краткое описание',
			'start_date' => 'Дата начала',
			'end_date' => 'Дата окончания',
			'position' => 'Позиция',
			'visibility' => 'Выводить',
			'link_to_event' => 'Ссылка на событие',
			'country' => 'Страна',
			'city' => 'Город',
			'author' => 'Автор',
			'visibility_from_user' => 'Виден для User',
			'visibility_from_diamond' => 'Виден для Diamond',
			'visibility_from_emerald' => 'Виден для Emerald',
			'visibility_from_platinum' => 'Виден для Platinum',
			'language' => 'Язык',
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

		$criteria->compare('calendar_id',$this->calendar_id);
		$criteria->compare('menu_name',$this->menu_name,true);
		$criteria->compare('h1',$this->h1,true);
		$criteria->compare('type',$this->type, true);
		$criteria->compare('short_text',$this->short_text,true);
		$criteria->compare('start_date',$this->start_date);
		$criteria->compare('end_date',$this->end_date);
		$criteria->compare('position',$this->position);
		$criteria->compare('visibility',$this->visibility);
		$criteria->compare('link_to_event',$this->link_to_event,true);
		$criteria->compare('country',$this->country);
		$criteria->compare('city',$this->city);
		$criteria->compare('author',$this->author);
		$criteria->compare('visibility_from_user',$this->visibility_from_user);
		$criteria->compare('visibility_from_diamond',$this->visibility_from_diamond);
		$criteria->compare('visibility_from_emerald',$this->visibility_from_emerald);
		$criteria->compare('visibility_from_platinum',$this->visibility_from_platinum);
		$criteria->compare('language',$this->language,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}