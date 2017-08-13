<?php

namespace shoxabbos\news;

/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{

    public $defaultRoute = "news";

    /*
     * Yangiliklar tablitsasi nomi
     */
    public static $newsTableName = "news";


    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
