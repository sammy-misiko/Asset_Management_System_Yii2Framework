<?php

use yii\db\Migration;
use yii\db\Expression;

/**
 * Class m240319_142025_myallasset_migration
 */
class m240319_142025_myallasset_migration extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute('DROP TRIGGER IF EXISTS populate_myallassets_trigger');
        $this->execute('DROP TRIGGER IF EXISTS populate_myallassets_update_trigger');
        $this->dropTable('myallassets');
         // Create the new table
         $this->createTable('myallassets', [
            'record_time' => $this->dateTime()->defaultValue(new Expression('NOW()')),
            'serialno' => $this->string(255),
            'name' => $this->string(255)->notNull(),
            'model' => $this->string(255)->notNull(),
            'state' => $this->string(255)->notNull(),
            'assettag' => $this->string(255),
            'location' => $this->string(255),
            'region_from' =>$this->string(255)->notNull(),
            'project_type' => $this->string(255),
            'received_date' => $this->dateTime()->notNull(),
            'supplier' => $this->string(255),
            'purchase_date' => $this->dateTime(),
            'purchase_price' => $this->integer(12),
            // Add more columns as needed
        ]);

        $this->addPrimaryKey('myallassets_pk', 'myallassets', 'record_time');

        // Create trigger to populate new_table from existing_table
        $this->execute("
            CREATE TRIGGER populate_myallassets_trigger AFTER INSERT ON myassets
            FOR EACH ROW
            BEGIN
                INSERT INTO myallassets (serialno,name,model,state,assettag,location,region_from,project_type,received_date,supplier,purchase_date,purchase_price) VALUES (NEW.serialno,NEW.name,NEW.model,NEW.state,NEW.assettag,NEW.location,NEW.region_from,NEW.project_type,NEW.received_date,NEW.supplier,NEW.purchase_date,NEW.purchase_price);
                
                -- Add more INSERT statements if needed for other columns
            END;
        ");

        $this->execute("
            CREATE TRIGGER populate_myallassets_update_trigger AFTER UPDATE ON myassets
            FOR EACH ROW
            BEGIN
                
                UPDATE myallassets SET serialno = NEW.serialno, name = NEW.name, model = NEW.model, state = NEW.state,
                 assettag = NEW.assettag, location = NEW.location, region_from = NEW.region_from, project_type = NEW.project_type, received_date = NEW.received_date, 
                 supplier = NEW.supplier, purchase_date = NEW.purchase_date, purchase_price = NEW.purchase_price  WHERE serialno = OLD.serialno;
                
            END;
        ");
    

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->execute('DROP TRIGGER IF EXISTS populate_myallassets_trigger');
        $this->execute('DROP TRIGGER IF EXISTS populate_myallassets_update_trigger');
        $this->dropTable('myallassets');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240319_142025_myallasset_migration cannot be reverted.\n";

        return false;
    }
    */
}
