<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Dispose]].
 *
 * @see Dispose
 */
class DisposeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Dispose[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Dispose|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
