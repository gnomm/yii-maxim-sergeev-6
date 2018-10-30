<?php

namespace app\models\tables;

use app\events\SentTaskMailEvent;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\Url;
use yii\imagine\Image;
use yii\web\UploadedFile;
use yii\base\Model;

/**
 * This is the model class for table "tasks".
 *
 * @property int $id
 * @property int $name
 * @property string $description
 * @property string $date
 * @property int $user_id

 * @property Users $user
 *  @var $image UploadedFile
 * */

class Tasks extends \yii\db\ActiveRecord
{

//    public $image;

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'value' => new Expression('NOW()'),
            ],
        ];
    }


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tasks';
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description'], 'required'],
            [['user_id'], 'integer'],
            [['name', 'description'], 'string'],
            [['date'], 'safe'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
//            [['date'], 'default', 'value' => date('Y-m-d:H:i:s')],
            [['date'], 'default', 'value' => new Expression('NOW()')],
//            [['date'], 'default', 'value' => Tasks::find()->],
            [['image'], 'file', 'extensions' => 'jpg, png'],
            [['date'], 'compare', 'compareValue' => date('Y-m-d'), 'operator' => '>='],
//            [['date'], 'compare', 'compareValue' => new Expression('NOW()'), 'operator' => '>='],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'date' => 'Date',
            'user_id' => 'User ID',
            'image' => 'Image'
//            'created_at' => 'Created_at',
//            'updated_at' => 'Updated_at'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }

    public static function getTaskCurrentMonth($month, $id)
    {
        return static::find()
            ->where(["MONTH(date)" => $month, "user_id" => $id])//            ->with('user')
            ;

//        $tasks = \Yii::$app->db->createCommand("
//        SELECT * FROM tasks WHERE MONTH(`date`) = MONTH(NOW()) AND YEAR(`date`) = YEAR(NOW())
//         ")
//            ->queryAll();
//        return $tasks;
    }

    public static function getUsers($id)
    {
        return static::find()
            ->where(['user_id' => $id])
            ->all();
    }

    public static function getUserEmail($event)
    {
        return static::find()
            ->where(['user_id' => $event->sender->user_id])
            ->with('user')
            ->one();
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
}
