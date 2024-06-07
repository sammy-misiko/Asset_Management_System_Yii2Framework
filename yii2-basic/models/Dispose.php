<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dispose".
 *
 * @property int $id
 * @property string|null $serialno
 * @property string $name
 * @property string $model
 * @property string $state
 * @property string|null $assettag
 * @property string|null $location
 * @property string $region_from
 *
 * @property Myassets $serialno0
 */
class Dispose extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dispose';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'model', 'state', 'region_from'], 'required'],
            [['serialno', 'name', 'model', 'state', 'assettag', 'location', 'region_from'], 'string', 'max' => 255],
            [['serialno'], 'exist', 'skipOnError' => true, 'targetClass' => Myassets::class, 'targetAttribute' => ['serialno' => 'serialno']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'serialno' => 'Serialno',
            'name' => 'Name',
            'model' => 'Model',
            'state' => 'State',
            'assettag' => 'Assettag',
            'location' => 'Location',
            'region_from' => 'Region From',
        ];
    }

    /**
     * Gets query for [[Serialno0]].
     *
     * @return \yii\db\ActiveQuery|MyassetsQuery
     */
    public function getSerialno0()
    {
        return $this->hasOne(Myassets::class, ['serialno' => 'serialno']);
    }

    /**
     * {@inheritdoc}
     * @return DisposeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DisposeQuery(get_called_class());
    }
}
