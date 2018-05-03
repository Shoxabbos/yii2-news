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
    function behaviors()
    {
        return [
            [
                'class' => UploadBehavior::className(),
                'attribute' => 'photo',
                'scenarios' => ['insert', 'update'],
                'path' => '@webroot/uploads/news/{id}',
                'url' => '@web/uploads/news/{id}',
                'thumbs' => [
                    'news_thumb' => ['width' => 110, 'height' => 110, 'bg_color' => 'fff'],
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
            [['title', 'content'], 'required'],
            [['content'], 'string'],
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
            'title' => 'Title',
            'content' => 'Content',
            'photo' => 'Photo',
            'views' => 'Views',
            'date' => 'Date',
        ];
    }

}
