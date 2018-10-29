<?php

namespace app\models;

use app\behaviors\MyBehaviors;
use app\events\TestFooEvent;
use Yii;
use app\validators\MyValidator;
use yii\base\Event;
use yii\base\Model;

class Test extends Model
{
    public $title;
    public $content;

    const EVENT_FOO_START = 'foo_start';
    const EVENT_FOO_END = 'foo_end';

    public function rules()
    {
        return [
            [['title'], 'myValidate'],
            [['content'], 'myValidate']
        ];
    }

    public function behaviors()
    {
        return [
          'my' => [
              'class' => MyBehaviors::class,
              'massage' => 'Привит, мир!!!'
              ]
        ];
    }



//    public function myValidate($attribute, $params) {
//        if($this->$attribute != 'Привет') {
//            $this->addError($attribute, 'Напиши привет');
//

    public function fields()
    {
        return [
            'name' => 'title'
        ];
    }

    public function foo() {
        $event = new TestFooEvent();
        $event->massage = date('Y-m-d');

        $this->trigger(static::EVENT_FOO_START, $event);
        echo "<br>";
        echo "действие 1 <br>";
        echo "действие 2 <br>";
        echo "действие 3 <br>";
        $this->trigger(static::EVENT_FOO_END);
    }

}