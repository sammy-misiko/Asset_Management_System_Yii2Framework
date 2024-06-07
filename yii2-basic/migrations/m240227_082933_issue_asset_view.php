<?php

use yii\db\Migration;

/**
 * Class m240227_082933_issue_asset_view
 */
class m240227_082933_issue_asset_view extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("
            CREATE VIEW issue_asset_view AS
            SELECT serialno, name, model, state, assettag, region_from FROM myassets WHERE state IN ('Working', 'Dispose');
        ");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240227_082933_issue_asset_view cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240227_082933_issue_asset_view cannot be reverted.\n";

        return false;
    }
    */
}
