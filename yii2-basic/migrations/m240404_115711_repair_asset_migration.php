<?php

use yii\db\Migration;

/**
 * Class m240404_115711_repair_asset_migration
 */
class m240404_115711_repair_asset_migration extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('repair', [
            'id' => $this->primaryKey(),
            'serialno' => $this->string(255),
            'name' => $this->string(255)->notNull(),
            'model' => $this->string(255)->notNull(),
            'state' => $this->string(255)->notNull(),
            'assettag' => $this->string(255),
            'location' => $this->string(255),
            'region_from' =>$this->string(255)->notNull(),
        ]);
    
        // $this->addPrimaryKey('asset_register_pk', 'asset_register', 'serialno');
        $this->addForeignKey('fk_repair_serialno', 'dispose', 'serialno', 'myassets', 'serialno');

        $this->execute("
            CREATE TRIGGER populate_repair AFTER INSERT ON myassets
            FOR EACH ROW
            BEGIN
                
                IF NEW.state = 'Repair' THEN 

                    INSERT INTO repair (serialno,name,model,state,assettag,location,region_from) VALUES (NEW.serialno,NEW.name,NEW.model,NEW.state,NEW.assettag,NEW.location,NEW.region_from);

                END IF;
            END

            
        ");

        $this->execute("
            CREATE TRIGGER repair_on_update AFTER UPDATE ON myassets
            FOR EACH ROW
            BEGIN
                
                IF NEW.state = 'Repair' THEN
                    INSERT INTO repair (serialno,name,model,state,assettag,location,region_from) VALUES (NEW.serialno,NEW.name,NEW.model,NEW.state,NEW.assettag,NEW.location,NEW.region_from);

                END IF;

                IF NEW.state = 'Working' OR NEW.state = 'Dispose' OR NEW.state = 'Faulty' THEN
                    DELETE FROM repair WHERE serialno = NEW.serialno;
                END IF;
            END

            
        ");

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240404_115711_repair_asset_migration cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240404_115711_repair_asset_migration cannot be reverted.\n";

        return false;
    }
    */
}
