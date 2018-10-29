<?php
/**
 * Created by PhpStorm.
 * User: gnom
 * Date: 23.10.2018
 * Time: 16:39
 */

namespace app\events;


use yii\base\Event;

class SentTaskMailEvent extends Event
{
    public $sentMassage;
}