<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mylogs".
 *
 * @property string|null $issuedby
 * @property string|null $issuedto
 * @property string|null $receivedby
 * @property string|null $receivedfrom
 * @property string|null $state
 * @property string|null $serialno
 * @property string $issue_date
 * @property string|null $asset_location
 * @property string|null $disposal
 * @property string|null $disposed_by
 * @property string|null $repaired
 * @property string|null $repaired_by
 */
class Mylogs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mylogs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['issue_date'], 'required'],
            [['issue_date'], 'safe'],
            [['issuedby', 'issuedto', 'receivedby', 'receivedfrom', 'state', 'serialno', 'asset_location', 'disposal', 'disposed_by', 'repaired', 'repaired_by'], 'string', 'max' => 255],
            [['issue_date'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'issuedby' => 'Issued By',
            'issuedto' => 'Issued To',
            'receivedby' => 'Received By',
            'receivedfrom' => 'Received From',
            'state' => 'Condition',
            'serialno' => 'Serial No',
            'issue_date' => 'Issue Date',
            'asset_location' => 'Asset Location',
            'disposal' => 'Disposal',
            'disposed_by' => 'Disposed By',
            'repaired' => 'Repaired',
            'repaired_by' => 'Repaired By',
        ];
    }

    /**
     * {@inheritdoc}
     * @return MylogsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MylogsQuery(get_called_class());
    }
}
