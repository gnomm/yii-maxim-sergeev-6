<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

//use yii\bootstrap\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\tables\tasks */
/* @var $form yii\widgets\ActiveForm */
/* @var $users  array */

?>


<?php //var_dump($users)?>
<!---->
<!---->
<!---->
<!---->
<!---->
<!--<h2>Сортировка</h2>-->
<?php //$form = ActiveForm::begin(); ?>
<?php //$form->field($model, 'id')->textInput() ?>
<!---->
<?php //ActiveForm::end(); ?>




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
            }
        ],

        ['class' => 'yii\grid\ActionColumn'],
    ],
//    'itemView' => 'single_cart',
//    'viewsParams' => [
////        'hideBreadcrumbs' => true
//    ]
]) ?>
