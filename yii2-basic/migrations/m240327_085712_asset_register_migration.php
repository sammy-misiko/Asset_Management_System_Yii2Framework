<?php

use yii\db\Migration;

/**
 * Class m240327_085712_asset_register_migration
 */
class m240327_085712_asset_register_migration extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropTable('asset_register');
        $this->execute('DROP TRIGGER IF EXISTS populate_asset_register');
        $this->execute('DROP TRIGGER IF EXISTS populate_asset_register_update_trigger');

        $this->createTable('asset_register', [
            'issuedto' => $this->string(255),
            'state' => $this->string(255),
            'serialno' => $this->string(255),
            'name' => $this->string(255),
        ]);
    
        $this->addPrimaryKey('asset_register_pk', 'asset_register', 'serialno');
        $this->addForeignKey('fk_asset_register_serialno', 'asset_register', 'serialno', 'myassets', 'serialno');

        $this->execute("
            CREATE TRIGGER populate_asset_register AFTER INSERT ON mylogs
            FOR EACH ROW
            BEGIN
                DECLARE asset_name VARCHAR(255);
                SELECT name INTO asset_name FROM myassets WHERE serialno = NEW.serialno LIMIT 1;
                
                IF NEW.issuedto IS NOT NULL THEN

                    INSERT INTO asset_register (issuedto,state,serialno,name) VALUES (NEW.issuedto,NEW.state,NEW.serialno,asset_name);
                END IF;
            END
        ");

        $this->execute("
            CREATE TRIGGER populate_asset_register_update_trigger AFTER UPDATE ON myassets
            FOR EACH ROW
            BEGIN
                
                UPDATE asset_register SET serialno = NEW.serialno, name = NEW.name, state = NEW.state  WHERE serialno = OLD.serialno;
                
            END;
        ");

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('asset_register');
        $this->execute('DROP TRIGGER IF EXISTS populate_asset_register');
        $this->execute('DROP TRIGGER IF EXISTS populate_asset_register_update_trigger');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240327_085712_asset_register_migration cannot be reverted.\n";

        return false;
    }
    */
}
