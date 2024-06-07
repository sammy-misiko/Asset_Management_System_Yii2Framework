<?php

use yii\db\Migration;

/**
 * Class m240327_095524_issue_asset_migration
 */
class m240327_095524_issue_asset_migration extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropTable('issue_asset');
        $this->execute('DROP TRIGGER IF EXISTS populate_issue_asset');
        $this->execute('DROP TRIGGER IF EXISTS delete_issue_asset');
        $this->execute('DROP TRIGGER IF EXISTS populate_issue_asset_on_update');
        $this->execute('DROP TRIGGER IF EXISTS issue_asset_on_delete');


        $this->createTable('issue_asset', [
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
        $this->addForeignKey('fk_issue_asset_serialno', 'issue_asset', 'serialno', 'myassets', 'serialno');

        $this->execute("
            CREATE TRIGGER populate_issue_asset AFTER INSERT ON myassets
            FOR EACH ROW
            BEGIN
                
                IF NEW.state = 'Working' OR  NEW.state = 'Dispose' AND NEW.location = 'Ready' THEN 

                    INSERT INTO issue_asset (serialno,name,model,state,assettag,location,region_from) VALUES (NEW.serialno,NEW.name,NEW.model,NEW.state,NEW.assettag,NEW.location,NEW.region_from);

                END IF;
            END

            
        ");

        $this->execute("
            CREATE TRIGGER populate_issue_asset_on_update AFTER UPDATE ON myassets
            FOR EACH ROW
            BEGIN
                
                IF NEW.state = 'Working' OR  NEW.state = 'Dispose' THEN
                    DELETE FROM issue_asset WHERE serialno = OLD.serialno ;
                    INSERT INTO issue_asset (serialno,name,model,state,assettag,location,region_from) VALUES (NEW.serialno,NEW.name,NEW.model,NEW.state,NEW.assettag,NEW.location,NEW.region_from);

                END IF;
            END

            
        ");

        $this->execute("
            CREATE TRIGGER issue_asset_on_delete AFTER DELETE ON myassets
                FOR EACH ROW
                BEGIN 

                    DELETE FROM issue_asset WHERE serialno = OLD.serialno ;

                END
        ");


        $this->execute("
            CREATE TRIGGER delete_issue_asset AFTER UPDATE ON myassets
                FOR EACH ROW
                BEGIN
                    
                    IF NEW.state = 'Faulty' OR  NEW.state = 'Repair' OR NEW.location = 'Issued' THEN 

                        DELETE FROM issue_asset WHERE serialno = NEW.serialno ;

                    END IF;
                END
        ");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('issue_asset');
        $this->execute('DROP TRIGGER IF EXISTS populate_issue_asset');
        $this->execute('DROP TRIGGER IF EXISTS delete_issue_asset');
        $this->execute('DROP TRIGGER IF EXISTS populate_issue_asset_on_update');
        $this->execute('DROP TRIGGER IF EXISTS issue_asset_on_delete');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240327_095524_issue_asset_migration cannot be reverted.\n";

        return false;
    }
    */
}
