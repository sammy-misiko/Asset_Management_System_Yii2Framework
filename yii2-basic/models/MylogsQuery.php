<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Mylogs]].
 *
 * @see Mylogs
 */
class MylogsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Mylogs[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Mylogs|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
