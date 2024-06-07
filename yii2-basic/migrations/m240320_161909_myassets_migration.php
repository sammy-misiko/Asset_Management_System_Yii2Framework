<?php

use yii\db\Migration;
use yii\db\Expression;


/**
 * Class m240320_161909_myassets_migration
 */
class m240320_161909_myassets_migration extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropTable('myassets');

        $this->createTable('myassets', [
            'serialno' => $this->string(255),
            'name' => $this->string(255)->notNull(),
            'model' => $this->string(255)->notNull(),
            'state' => $this->string(255)->notNull(),
            'assettag' => $this->string(255),
            'location' => $this->string(255),
            'region_from' =>$this->string(255)->notNull(),
            'project_type' => $this->string(255),
            'received_date' => $this->dateTime()->defaultValue(new \yii\db\Expression('NOW()')),
            'supplier' => $this->string(255),
            'purchase_date' => $this->dateTime()->defaultValue(new \yii\db\Expression('NOW()')),
            'purchase_price' => $this->integer(12),
        ]);

        $this->addPrimaryKey('myassets_pk','myassets','serialno');
    }


    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('myassets');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240320_161909_myassets_migration cannot be reverted.\n";

        return false;
    }
    */
}
