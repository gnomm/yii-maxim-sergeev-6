<?php
/** @var \yii\widgets\ActiveForm $form*/
/* @var $model app\models\test */


//echo 'test';

//var_dump($model);
$form = \yii\widgets\ActiveForm::begin();

echo $form->field($model, 'title')->textInput();
echo $form->field($model, 'content')->textInput();
echo $form->field($model, 'image')->fileInput();
echo \yii\helpers\Html::submitButton('Загрузить');

\yii\widgets\ActiveForm::end();