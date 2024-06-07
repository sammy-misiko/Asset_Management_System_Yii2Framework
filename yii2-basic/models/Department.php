<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "department".
 *
 * @property string $depname
 * @property string|null $section
 *
 * @property Section $section0
 * @property Staff[] $staff
 */
class Department extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'department';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['depname','section'], 'required'],
            [['depname', 'section'], 'string', 'max' => 255],
            [['depname'], 'unique'],
            [['section'], 'exist', 'skipOnError' => true, 'targetClass' => Section::class, 'targetAttribute' => ['section' => 'section']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'depname' => 'Department Name',
            'section' => 'Section',
        ];
    }

    /**
     * Gets query for [[Section0]].
     *
     * @return \yii\db\ActiveQuery|SectionQuery
     */
    public function getSection0()
    {
        return $this->hasOne(Section::class, ['section' => 'section']);
    }

    /**
     * Gets query for [[Staff]].
     *
     * @return \yii\db\ActiveQuery|StaffQuery
     */
    public function getStaff()
    {
        return $this->hasMany(Staff::class, ['depname' => 'depname']);
    }

    /**
     * {@inheritdoc}
     * @return DepartmentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DepartmentQuery(get_called_class());
    }
}
