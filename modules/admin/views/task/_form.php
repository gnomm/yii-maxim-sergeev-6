<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\tables\tasks */
/* @var $form yii\widgets\ActiveForm */
/* @var $users  array */
?>

<?php //var_dump($model)?>
<div class="tasks-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'date')->widget(\yii\jui\DatePicker::class, [
        'dateFormat' => 'yyyy-MM-dd',
        'language' => 'ru'
    ]) ?>

<!--    --><?//= $form->field($model, 'user_id')->tes ?>
    <?= $form->field($model, 'user_id')->dropDownList($users) ?>
<!--    --><?//= $form->field($model, 'created_at') ?>
<!--    --><?//= $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <!--    --><?php //echo \yii\jui\DatePicker::widget([
    //        'nodel' => $model,
    //        'attribute' => 'date',
    //        'dateFormat' => 'yyyy-MM-dd',
    //        'language' => 'ru'
    //    ]) ?>

    <?php ActiveForm::end(); ?>

</div>
