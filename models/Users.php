<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $full_name
 * @property string $login
 * @property string $phone_number
 * @property string $region
 * @property string $city
 * @property string $street_name
 * @property int $house_number
 * @property int $apartment_number
 */
class Users extends \yii\db\ActiveRecord implements IdentityInterface
{

    public $region;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['login'], 'email'],
            [['login'], 'unique', 'targetClass'=>'app\models\Users', 'targetAttribute'=>'login'],
            [['full_name', 'login', 'phone_number', 'street_name', 'house_number', 'apartment_number'], 'required'],
            [['house_number', 'region', 'city_id', 'apartment_number'], 'integer'],
            [['full_name'], 'string', 'max' => 255],
            [['login', 'phone_number', 'street_name'], 'string', 'max' => 45],
            ['phone_number', 'match', 'pattern' => '/^\+380\d{9}$/'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'full_name' => 'ПІБ',
            'login' => 'Логін',
            'phone_number' => 'Номер телефону',
            'region' => 'Регіон',
            'city_id' => 'Город',
            'street_name' => 'Назва вулиці',
            'house_number' => 'Номер будинку',
            'apartment_number' => 'Номер квартири',
        ];
    }


    public static function findIdentity($id)
    {
        return Users::findOne($id);
    }

    public function getId()
    {
        return $this->id;
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
    }


    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method.
    }

    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
    }

    public static function findByLogin($email)
    {
        return Users::find()->where(['login'=>$email])->one();
    }

    public function getCity()
    {
        return $this->hasOne(Region::className(), ['id' => 'city_id']);
    }

    public function getAddress()
    {
        return $this->city->region->name . ', м.' .
                $this->city->name . ', вул.' .
                $this->street_name . ' буд.' .
                $this->house_number . ', кв.' .
                $this->apartment_number;
    }

    public function signup()
    {
        if ($this->validate()) {
            $user = new Users;
            $user->attributes = $this->attributes;
            return $user->save();
        }
    }


}
