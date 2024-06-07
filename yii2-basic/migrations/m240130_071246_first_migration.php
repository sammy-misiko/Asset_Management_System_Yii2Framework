<?php

use yii\db\Migration;

/**
 * Class m240130_071246_first_migration
 */
class m240130_071246_first_migration extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('section', [
            'section' => $this->string(255)
        ]);

        $this->createTable('department', [
            'depname' => $this->string(255),
            'section' => $this->string(255),
        ]);

        $this->createTable('staff', [
            'username' => $this->string(255),
            'staffno' => $this->integer(10)->notNull(),
            'depname' => $this->string(255)->notNull(),
        ]);

        $this->createTable('assets', [
            'serialno' => $this->string(255),
            'name' => $this->string(255)->notNull(),
            'model' => $this->string(255)->notNull(),
            'state' => $this->string(255)->notNull(),
            'assettag' => $this->string(255),
            'region_from' =>$this->string(255)->notNull(),
            'project_type' => $this->string(255),
            'received_date' => $this->dateTime()->notNull(),
            'supplier' => $this->string(255),
            'purchase_date' => $this->dateTime(),
            'purchase_price' => $this->integer(12),
        ]);

        $this->addPrimaryKey('section_pk','section','section');
        $this->addPrimaryKey('depname_pk','department','depname');
        $this->addPrimaryKey('staff_pk','staff','username');
        $this->addPrimaryKey('assets_pk','assets','serialno');

        $this->addForeignKey('fk_staff_depname','staff','depname', 'department','depname');
        $this->addForeignKey('fk_department_section','department','section','section','section');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240130_071246_first_migration cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240130_071246_first_migration cannot be reverted.\n";

        return false;
    }
    */
}
