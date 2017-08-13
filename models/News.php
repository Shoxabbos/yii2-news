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
    public function rules()
    {
        return [
            [['title', 'content'], 'required'],
            [['content'], 'string'],
            [['views'], 'integer'],
            [['date'], 'safe'],
            [['title', 'photo'], 'string', 'max' => 255],
            ['date', 'default', 'value' => date("Y-m-d H:i")],
        ];
    }

    public function fields()
    {
        $data = parent::fields();

        unset($data['photo']);
        $data['photoUrl'] = 'photoUrl';

        return $data;
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

    public function getPhotoUrl()
    {
        if (is_file($this->photo)) {
            return Yii::$app->request->hostInfo."/".$this->photo;
        } else {
            return false;
        }
    }

    public function uploadFile()
    {
        if (is_object($this->photo)) {
            $name = 'uploads/' . md5($this->photo->baseName.rand())  . '.' . $this->photo->extension;
            if ($this->photo->saveAs($name)) {

                if ($this->getOldAttribute("photo")) {
                    is_file($this->getOldAttribute("photo")) && unlink($this->getOldAttribute("photo"));
                }

                chmod($name, 0777);
                $this->photo = $name;
            }
        } else $this->photo = $this->getOldAttribute("photo");
    }

}
