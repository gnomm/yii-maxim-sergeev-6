<?php

namespace app\models;

use app\behaviors\MyBehaviors;
use app\events\TestFooEvent;
use Yii;
use app\validators\MyValidator;
use yii\base\Event;
use yii\base\Model;
use yii\db\Expression;
use yii\imagine\Image;
use yii\web\UploadedFile;


class Test extends Model
{
    public $title;
    public $content;
    /** @var UploadedFile */
    public $image;

//    public static function tableName()
//    {
//        return 'test';
//    }


    public function rules()
    {
        return [
            [['image'], 'file', 'extensions' => 'jpg, png'],
            [['title', 'content'], 'safe'],
        ];
    }


    public function upload()
    {
        if ($this->validate()) {
            $basename = $this->image->getBaseName() . "." . $this->image->getExtension();
            $filename = '@webroot/uploadImg/' . $basename;
            $this->image->saveAs(\Yii::getAlias($filename));

            Image::thumbnail($filename, 100, 100)
                ->save(\Yii::getAlias('@webroot/uploadImg/small/' . $basename));
        }
        return false;
    }

//    public function attributeLabels()
//    {
//        return [
//            'title' => 'Title',
//            'content' => 'Content',
//            'image' => 'Image'
//        ];
//    }

//    public function behaviors()
//    {
//        return [
//            'my' => [
//                'class' => MyBehaviors::class,
//                'massage' => 'Привит, мир!!!'
//            ]
//        ];
//    }
//
//
//
//    public function myValidate($attribute, $params) {
//        if($this->$attribute != 'Привет') {
//            $this->addError($attribute, 'Напиши привет');
//
//
//    public function fields()
//    {
//        return [
//            'name' => 'title'
//        ];
//    }
//
//    public function foo()
//    {
//        $event = new TestFooEvent();
//        $event->massage = date('Y-m-d');
//
//        $this->trigger(static::EVENT_FOO_START, $event);
//        echo "<br>";
//        echo "действие 1 <br>";
//        echo "действие 2 <br>";
//        echo "действие 3 <br>";
//        $this->trigger(static::EVENT_FOO_END);
//    }

}