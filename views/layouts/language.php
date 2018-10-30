<?php

use yii\bootstrap\Html;


if (Yii::$app->language == 'ru') {
    echo Html::a('go to English', array_merge(Yii::$app->request->get(),
        [Yii::$app->controller->route, 'language' => 'en']
        ) );
}
else {
    echo Html::a('перейти на русский', array_merge(Yii::$app->request->get(),
        [Yii::$app->controller->route, 'language' => 'ru']
    ) );
}
