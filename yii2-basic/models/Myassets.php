<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "myassets".
 *
 * @property string $serialno
 * @property string $name
 * @property string $model
 * @property string $state
 * @property string|null $assettag
 * @property string|null $location
 * @property string $region_from
 * @property string|null $project_type
 * @property string|null $received_date
 * @property string|null $supplier
 * @property string|null $purchase_date
 * @property int|null $purchase_price
 *
 * @property AssetRegister $assetRegister
 * @property IssueAsset[] $issueAssets
 */
class Myassets extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'myassets';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['serialno', 'name', 'model', 'state', 'region_from'], 'required'],
            [['received_date', 'purchase_date'], 'safe'],
            [['purchase_price'], 'integer'],
            [['serialno', 'name', 'model', 'state', 'assettag', 'location', 'region_from', 'project_type', 'supplier'], 'string', 'max' => 255],
            [['serialno'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'serialno' => 'Serialno',
            'name' => 'Name',
            'model' => 'Model',
            'state' => 'State',
            'assettag' => 'Assettag',
            'location' => 'Location',
            'region_from' => 'Region From',
            'project_type' => 'Project Type',
            'received_date' => 'Received Date',
            'supplier' => 'Supplier',
            'purchase_date' => 'Purchase Date',
            'purchase_price' => 'Purchase Price',
        ];
    }

    /**
     * Gets query for [[AssetRegister]].
     *
     * @return \yii\db\ActiveQuery|AssetRegisterQuery
     */
    public function getAssetRegister()
    {
        return $this->hasOne(AssetRegister::class, ['serialno' => 'serialno']);
    }

    /**
     * Gets query for [[IssueAssets]].
     *
     * @return \yii\db\ActiveQuery|IssueAssetQuery
     */
    public function getIssueAssets()
    {
        return $this->hasMany(IssueAsset::class, ['serialno' => 'serialno']);
    }

    /**
     * {@inheritdoc}
     * @return MyassetsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MyassetsQuery(get_called_class());
    }
}
