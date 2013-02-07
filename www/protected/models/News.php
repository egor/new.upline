<?php

/**
 * This is the model class for table "news".
 *
 * The followings are the available columns in table 'news':
 * @property string $news_id
 * @property string $url
 * @property string $menu_name
 * @property string $text
 * @property string $short_text
 * @property integer $visibility
 * @property string $language
 * @property string $meta_title
 * @property string $meta_keywords
 * @property string $meta_description
 * @property string $h1
 * @property integer $in_main
 * @property integer $box
 * @property integer $news_type_id
 * @property string $link_to_event
 * @property integer $event
 * @property string $pic
 * @property string $color
 * @property string $date
 */
class News extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return News the static model class
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
		return 'news';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('url, menu_name, text, short_text, visibility, language, meta_title, meta_keywords, meta_description, h1, in_main, box, news_type_id, link_to_event, event, pic, color, date', 'required'),
                        array('text, short_text', 'safe'),
			array('visibility, in_main, box, news_type_id, event', 'numerical', 'integerOnly'=>true),
			array('url, menu_name, meta_title, meta_keywords, meta_description, h1, link_to_event, pic', 'length', 'max'=>255),
			array('language', 'length', 'max'=>3),
			array('color, date', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('news_id, url, menu_name, text, short_text, visibility, language, meta_title, meta_keywords, meta_description, h1, in_main, box, news_type_id, link_to_event, event, pic, color, date', 'safe', 'on'=>'search'),
                        //array('url','unique','message' => 'url уже существует', 'on'=>'edit'),
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
			'news_id' => 'News',
			'url' => 'Url (добустимые символы в url [A-Z a-z - _])',
			'menu_name' => 'Название',
			'text' => 'Текст',
			'short_text' => 'Краткое описание',
			'visibility' => 'Выводить на сайт',
			'language' => 'Язык страницы',
			'meta_title' => 'Meta Title',
			'meta_keywords' => 'Meta Keywords',
			'meta_description' => 'Meta Description',
			'h1' => 'Заголовок Н1',
			'in_main' => 'Выводить на главную',
			'box' => 'Номер плитки',
			'news_type_id' => 'Тип новости',
			'link_to_event' => 'Ссылка на событие',
			'event' => 'Новость о событии',
			'pic' => 'Картинка',
			'color' => 'Цыет плитки',
			'date' => 'Дата',
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

		$criteria->compare('news_id',$this->news_id,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('menu_name',$this->menu_name,true);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('short_text',$this->short_text,true);
		$criteria->compare('visibility',$this->visibility);
		$criteria->compare('language',$this->language,true);
		$criteria->compare('meta_title',$this->meta_title,true);
		$criteria->compare('meta_keywords',$this->meta_keywords,true);
		$criteria->compare('meta_description',$this->meta_description,true);
		$criteria->compare('h1',$this->h1,true);
		$criteria->compare('in_main',$this->in_main);
		$criteria->compare('box',$this->box);
		$criteria->compare('news_type_id',$this->news_type_id);
		$criteria->compare('link_to_event',$this->link_to_event,true);
		$criteria->compare('event',$this->event);
		$criteria->compare('pic',$this->pic,true);
		$criteria->compare('color',$this->color,true);
		$criteria->compare('date',$this->date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}