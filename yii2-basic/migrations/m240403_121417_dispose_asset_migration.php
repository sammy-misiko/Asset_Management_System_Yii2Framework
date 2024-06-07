<?php

use yii\db\Migration;

/**
 * Class m240403_121417_dispose_asset_migration
 */
class m240403_121417_dispose_asset_migration extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropTable('dispose');
        $this->execute('DROP TRIGGER IF EXISTS populate_dispose');
        $this->execute('DROP TRIGGER IF EXISTS dispose_on_update');

        $this->createTable('dispose', [
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
        $this->addForeignKey('fk_dispose_serialno', 'dispose', 'serialno', 'myassets', 'serialno');


        $this->execute("
            CREATE TRIGGER populate_dispose AFTER INSERT ON myassets
            FOR EACH ROW
            BEGIN
                
                IF NEW.state = 'Dispose' OR NEW.state = 'Faulty' THEN 

                    INSERT INTO dispose (serialno,name,model,state,assettag,location,region_from) VALUES (NEW.serialno,NEW.name,NEW.model,NEW.state,NEW.assettag,NEW.location,NEW.region_from);

                END IF;
            END

            
        ");

        $this->execute("
            CREATE TRIGGER dispose_on_update AFTER UPDATE ON myassets
            FOR EACH ROW
            BEGIN
                
                IF NEW.state = 'Dispose' OR NEW.state = 'Faulty' THEN
                    INSERT INTO dispose (serialno,name,model,state,assettag,location,region_from) VALUES (NEW.serialno,NEW.name,NEW.model,NEW.state,NEW.assettag,NEW.location,NEW.region_from);

                END IF;

                IF NEW.state = 'Working' OR NEW.state = 'Repair' THEN
                    DELETE FROM dispose WHERE serialno = NEW.serialno;
                END IF;
            END

            
        ");

        // $this->execute("
        //     CREATE TRIGGER delete_dispose_on_update AFTER UPDATE ON myassets
        //     FOR EACH ROW
        //     BEGIN
                
        //         IF NEW.state != 'Dispose' OR NEW.state != 'Faulty' THEN
        //             DELETE FROM dispose WHERE serialno = OLD.serialno;
        //         END IF;
        //     END

            
        // ");

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('dispose');
        $this->execute('DROP TRIGGER IF EXISTS populate_dispose');
        $this->execute('DROP TRIGGER IF EXISTS dispose_on_update');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240403_121417_dispose_asset_migration cannot be reverted.\n";

        return false;
    }
    */
}
