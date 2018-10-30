<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


//use yii\bootstrap\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\tables\tasks */
/* @var $form yii\widgets\ActiveForm */
/* @var $users  array */
?>

<?= \yii\grid\GridView::widget([
//    'model' => $model,
    'dataProvider' => $provider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

//        'id',
        'name',
        'description:ntext',
        'date',
        'user_id' => [
            'label' => 'Name',
            'value' => function ($data) {
                return $data->user->login;
            },

        ],
        'image' => [
            'attribute' => 'image',
            'format' => 'html',
            'value' => function ($data) {
                return Html::a(Html::img(Yii::getAlias('@web/uploadImg/small/') . $data['image']),
                    Yii::getAlias('@web/uploadImg/') . $data['image']);
//                return Html::img(Yii::getAlias('@web/uploadImg/small/') . $data['image']);
            }
        ],

        ['class' => 'yii\grid\ActionColumn'],
    ],
]) ?>
