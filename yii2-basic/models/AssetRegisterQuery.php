<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[AssetRegister]].
 *
 * @see AssetRegister
 */
class AssetRegisterQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return AssetRegister[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return AssetRegister|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
