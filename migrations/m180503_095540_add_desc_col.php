<?php

use yii\db\Migration;
use shoxabbos\news\Module;
/**
 * Class m180503_095540_add_desc_col
 */
class m180503_095540_add_desc_col extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn(Module::$newsTableName, "desc", $this->text()->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn(Module::$newsTableName, "desc");
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180503_095540_add_desc_col cannot be reverted.\n";

        return false;
    }
    */
}
