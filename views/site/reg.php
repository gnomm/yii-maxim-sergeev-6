<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

/* @var $model app\models\tables\Users */
/* @var $role  array */


$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-reg">
    <h2><?= Html::encode($this->title) ?></h2>

    <?php if (Yii::$app->session->hasFlash('regFormSubmitted')): ?>
        <div class="alert alert-success">
            Спасибо за регистрацию
        </div>

    <?php else: ?>
    <?php $form = ActiveForm::begin(['id' => 'reg-form']); ?>
    <div class="col-lg-4">
        <?= $form->field($model, 'login')->textInput(['autofocus' => true]) ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <!--        --><? //= $form->field($model, 'password_repeat')->passwordInput()->label('Re-Password') ?>
        <?= $form->field($model, 'email')->input('email')->hint('Введите ваш электронный адрес') ?>
        <?= $form->field($model, 'role_id')->dropDownList($role) ?>
        <div class="form-group">
            <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-primary', 'name' => 'reg-button']) ?>
        </div>
    </div>

</div>
<!---->
<? //= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
//    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
//]) ?>



<?php ActiveForm::end(); ?>
<?php endif; ?>
