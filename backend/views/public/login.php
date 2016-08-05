<?php
/**
 * Created by PhpStorm.
 * User: Edwin
 * Date: 2016/8/3
 * Time: 20:31
 */
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

?>
<div class="row-fluid login-wrapper">
    <a class="brand" href="index.html"></a>
    <?php $form = ActiveForm::begin(['fieldConfig' => ['template' => '{error}{input}']]); ?>
    <div class="span4 box">
        <div class="content-wrap">
            <h6>immoc - 后台管理</h6>
            <div class="form-group field-admin-adminuser">
                <p class="help-block help-block-error"></p>
                <?= $form->field($model, 'adminuser')->textInput(['class' => 'span12', 'placeholder' => '管理员账号']) ?>
                <div class="form-group field-admin-adminpass">
                    <p class="help-block help-block-error"></p>
                    <?= $form->field($model, 'adminpass')->passwordInput(['class' => 'span12', 'placeholder' => '管理员密码']) ?>
                    <?= Html::a('忘记密码?', [yii\helpers\Url::to('public/seekpassword')], ['class' => 'forgot']) ?>
                    <div class="form-group field-remember-me">
                        <?= $form->field($model, 'rememberMe')->checkbox(['id' => 'remember-me', 'name' => 'Admin[rememberMe]', 'value' => '1']) ?>
                    </div>
                    <?= Html::submitButton('登录', ['class' => 'btn-glow primary login']) ?>
                </div>
                <?php $form = ActiveForm::end() ?>
            </div>
