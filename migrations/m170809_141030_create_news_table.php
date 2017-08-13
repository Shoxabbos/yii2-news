<?php

use shoxabbos\news\Module;
use yii\db\Migration;

/**
 * Handles the creation of table `news`.
 */
class m170809_141030_create_news_table extends Migration
{

    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable(Module::$newsTableName, [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'content' => $this->text()->notNull(),
            'photo' => $this->string(255)->notNull(),
            'views' => $this->integer()->notNull()->defaultValue(0),
            'date' => $this->dateTime()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable(Module::$newsTableName);
    }
}
