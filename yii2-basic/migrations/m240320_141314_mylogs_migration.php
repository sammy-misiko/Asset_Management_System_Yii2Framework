<?php

use yii\db\Migration;
use yii\db\Expression;

/**
 * Class m240320_141314_mylogs_migration
 */
class m240320_141314_mylogs_migration extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropTable('mylogs');
        $this->execute('DROP TRIGGER IF EXISTS update_myasset');
        

        $this->createTable('mylogs', [
            'issuedby' => $this->string(255),
            'issuedto' => $this->string(255),
            'receivedby' => $this->string(255),
            'receivedfrom' => $this->string(255),
            'state' => $this->string(255),
            'serialno' => $this->string(255),
            'issue_date' => $this->dateTime()->defaultValue(new Expression('NOW()')),
            'asset_location' => $this->string(255),
            'disposal' => $this->string(255),
            'disposed_by' => $this->string(255),
            'repaired' => $this->string(255),
            'repaired_by' => $this->string(255),
        ]);
    
        $this->addPrimaryKey('issue_pk', 'mylogs', 'issue_date');
    
        // $this->addForeignKey('fk_issue_serialno', 'issue', 'serialno', 'myallassets', 'serialno');

        $this->execute("
            CREATE TRIGGER update_myasset AFTER INSERT ON mylogs
            FOR EACH ROW
            BEGIN
                
                IF NEW.state IS NOT NULL AND  NEW.asset_location IS NOT NULL THEN
                    
                    UPDATE myassets SET state = NEW.state, location = NEW.asset_location WHERE serialno = New.serialno;

                END IF;
            END

            
        ");
     
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('mylogs');
        $this->execute('DROP TRIGGER IF EXISTS update_myasset');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240320_141314_mylogs_migration cannot be reverted.\n";

        return false;
    }
    */
}
