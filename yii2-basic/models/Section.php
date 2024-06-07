<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "section".
 *
 * @property string $section
 *
 * @property Department[] $departments
 */
class Section extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'section';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['section'], 'required'],
            [['section'], 'string', 'max' => 255],
            [['section'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'section' => 'Section',
        ];
    }

    /**
     * Gets query for [[Departments]].
     *
     * @return \yii\db\ActiveQuery|DepartmentQuery
     */
    public function getDepartments()
    {
        return $this->hasMany(Department::class, ['section' => 'section']);
    }

    /**
     * {@inheritdoc}
     * @return SectionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SectionQuery(get_called_class());
    }
}
