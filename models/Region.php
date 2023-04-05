<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "region".
 *
 * @property int $id
 * @property string $name
 * @property int $parent_id
 * @property string $type
 */
class Region extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'region';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'parent_id', 'type'], 'required'],
            [['parent_id', 'type'], 'integer'],
            [['name'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'parent_id' => 'Parent ID',
            'type' => 'Type',
        ];
    }

    public function getChildren()
    {
        return $this->hasMany(Region::class, ['parent_id' => 'id']);
    }

    public function getRegion()
    {
        return $this->hasOne(self::class, ['id' => 'parent_id']);
    }

    public static function getCityList($region_id)
    {
        return self::find()
            ->select(['id', 'name'])
            ->where(['parent_id' => $region_id])
            ->asArray()
            ->all();
    }


}
