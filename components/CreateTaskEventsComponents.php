<?php
/**
 * Created by PhpStorm.
 * User: gnom
 * Date: 24.10.2018
 * Time: 15:12
 */

namespace app\components;

use Yii;
use app\models\tables\Tasks;
use yii\base\Component;
use yii\base\Event;


class CreateTaskEventsComponents extends Component
{
    public function init()
    {
        parent::init();
        Event::on(Tasks::class, Tasks::EVENT_AFTER_INSERT, function ($event) {


            $userEmail = Tasks::getUserEmail($event);

            Yii::$app->mailer->compose()
                ->setTo($userEmail->user->email)
                ->setFrom(\Yii::$app->params['adminEmail'])
                ->setSubject($event->sender->name)
                ->setTextBody($event->sender->description)
                ->send();
        });

    }
}