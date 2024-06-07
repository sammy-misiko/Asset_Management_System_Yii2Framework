<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "asset_register".
 *
 * @property string|null $issuedto
 * @property string|null $state
 * @property string $serialno
 * @property string|null $name
 *
 * @property Myassets $serialno0
 */
class AssetRegister extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'asset_register';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['serialno'], 'required'],
            [['issuedto', 'state', 'serialno', 'name'], 'string', 'max' => 255],
            [['serialno'], 'unique'],
            [['serialno'], 'exist', 'skipOnError' => true, 'targetClass' => Myassets::class, 'targetAttribute' => ['serialno' => 'serialno']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'issuedto' => 'Issuedto',
            'state' => 'State',
            'serialno' => 'Serialno',
            'name' => 'Name',
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
     * @return AssetRegisterQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AssetRegisterQuery(get_called_class());
    }
}
