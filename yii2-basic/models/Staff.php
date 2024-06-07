<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "staff".
 *
 * @property string $username
 * @property int $staffno
 * @property string $depname
 *
 * @property Department $depname0
 */
class Staff extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'staff';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'staffno', 'depname'], 'required'],
            [['staffno'], 'integer'],
            [['username', 'depname'], 'string', 'max' => 255],
            [['username'], 'unique'],
            [['depname'], 'exist', 'skipOnError' => true, 'targetClass' => Department::class, 'targetAttribute' => ['depname' => 'depname']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'username' => 'Staff Name',
            'staffno' => 'Staffno/ID',
            'depname' => 'Department Name',
        ];
    }

    /**
     * Gets query for [[Depname0]].
     *
     * @return \yii\db\ActiveQuery|DepartmentQuery
     */
    public function getDepname0()
    {
        return $this->hasOne(Department::class, ['depname' => 'depname']);
    }

    /**
     * {@inheritdoc}
     * @return StaffQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new StaffQuery(get_called_class());
    }
}
