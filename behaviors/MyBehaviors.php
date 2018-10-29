<?php
/**
 * Created by PhpStorm.
 * User: gnom
 * Date: 23.10.2018
 * Time: 10:31
 */

namespace app\behaviors;


use yii\base\Behavior;

class MyBehaviors extends Behavior
{
    public $massage = 'test';

    public function bar()
    {
//$this->owner

        echo $this->massage . $this->owner->title;
    }
}