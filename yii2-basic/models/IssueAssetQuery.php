<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[IssueAsset]].
 *
 * @see IssueAsset
 */
class IssueAssetQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return IssueAsset[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return IssueAsset|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
