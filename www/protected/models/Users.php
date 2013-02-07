<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $users_id
 * @property string $email
 * @property string $password
 * @property string $surname
 * @property string $name
 * @property string $patronymic
 * @property integer $number
 * @property string $phone
 * @property integer $registration_date
 * @property integer $status
 * @property string $role
 * @property string $default_language
 * @property string $foto
 * @property integer $users_type_id
 * @property string $diamond
 * @property string $emerald
 * @property string $platinum
 * @property integer $diamond_no
 * @property integer $emerald_no
 * @property integer $platinum_no
 * @property integer $up_user_no
 */
class Users extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Users the static model class
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
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email, password, surname, name, patronymic, number, phone, registration_date, status, role, default_language, foto, users_type_id, diamond, emerald, platinum, diamond_no, emerald_no, platinum_no, up_user_no', 'required'),
			array('number, registration_date, status, users_type_id, diamond_no, emerald_no, platinum_no, up_user_no', 'numerical', 'integerOnly'=>true),
			array('email, phone, foto', 'length', 'max'=>100),
			array('password, surname, name, patronymic, diamond, emerald, platinum', 'length', 'max'=>255),
			array('role', 'length', 'max'=>30),
			array('default_language', 'length', 'max'=>3),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('users_id, email, password, surname, name, patronymic, number, phone, registration_date, status, role, default_language, foto, users_type_id, diamond, emerald, platinum, diamond_no, emerald_no, platinum_no, up_user_no', 'safe', 'on'=>'search'),
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
			'users_id' => 'Users',
			'email' => 'Email',
			'password' => 'Password',
			'surname' => 'Surname',
			'name' => 'Name',
			'patronymic' => 'Patronymic',
			'number' => 'Number',
			'phone' => 'Phone',
			'registration_date' => 'Registration Date',
			'status' => 'Status',
			'role' => 'Role',
			'default_language' => 'Default Language',
			'foto' => 'Foto',
			'users_type_id' => 'Users Type',
			'diamond' => 'Diamond',
			'emerald' => 'Emerald',
			'platinum' => 'Platinum',
			'diamond_no' => 'Diamond No',
			'emerald_no' => 'Emerald No',
			'platinum_no' => 'Platinum No',
			'up_user_no' => 'Up User No',
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

		$criteria->compare('users_id',$this->users_id);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('surname',$this->surname,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('patronymic',$this->patronymic,true);
		$criteria->compare('number',$this->number);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('registration_date',$this->registration_date);
		$criteria->compare('status',$this->status);
		$criteria->compare('role',$this->role,true);
		$criteria->compare('default_language',$this->default_language,true);
		$criteria->compare('foto',$this->foto,true);
		$criteria->compare('users_type_id',$this->users_type_id);
		$criteria->compare('diamond',$this->diamond,true);
		$criteria->compare('emerald',$this->emerald,true);
		$criteria->compare('platinum',$this->platinum,true);
		$criteria->compare('diamond_no',$this->diamond_no);
		$criteria->compare('emerald_no',$this->emerald_no);
		$criteria->compare('platinum_no',$this->platinum_no);
		$criteria->compare('up_user_no',$this->up_user_no);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}