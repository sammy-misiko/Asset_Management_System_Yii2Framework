<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Myassets]].
 *
 * @see Myassets
 */
class MyassetsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Myassets[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Myassets|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
