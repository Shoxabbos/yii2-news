<?php

namespace shoxabbos\news\models;

use shoxabbos\news\Module;
use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property UploadedFile $photo
 * @property int $views
 * @property string $date
 * @property string $desc
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return Module::$newsTableName;
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => \mongosoft\file\UploadImageBehavior::className(),
                'attribute' => 'photo',
                'scenarios' => ['insert', 'update'],
                'path' => '@webroot/uploads/news/{id}',
                'url' => '@web/uploads/news/{id}',
                'thumbs' => [
                    'thumb' => ['width' => 110, 'height' => 110, 'bg_color' => 'fff'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'content', 'desc'], 'required'],
            [['content', 'desc'], 'string'],
            [['views'], 'integer'],
            [['views'], 'default', 'value' => 0],
            [['date'], 'safe'],
            [['title'], 'string', 'max' => 255],
            ['date', 'default', 'value' => date("Y-m-d H:i")],

            // on
            ['photo', 'image', 'extensions' => 'jpg, jpeg, gif, png', 'on' => ['insert', 'update']],
            ['photo', 'required', 'on' => ['insert']],
        ];
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'desc' => 'Описание',
            'content' => 'Контент',
            'photo' => 'Картинка',
            'views' => 'Просмотры',
            'date' => 'Дата',
        ];
    }

}
