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
    <?php $form = ActiveForm::begin(['fieldConfig' => ['template' => '{error}{input}']]) ?>
    <div class="span4 box">
        <div class="content-wrap">
            <h6>慕课商城 - 找回密码</h6>
            <div class="form-group field-admin-adminuser">
                <p class="help-block help-block-error"></p>
                <? if (Yii::$app->session->hasFlash('info')) {
                    echo Yii::$app->session->getFlash('info');
                } ?>
                <?= $form->field($model, 'adminuser')->textInput(['class' => 'span12', 'placeholder' => '管理员账号']) ?>
                <div class="form-group field-admin-adminemail">
                    <p class="help-block help-block-error"></p>
                    <?= $form->field($model, 'adminemail')->textInput(['id' => 'admin-adminemail', 'class' => 'span12', 'name' => 'Admin[adminemail]', 'placeholder' => '管理员电子邮箱']) ?>
                </div>
                <?= Html::a('返回登录', [yii\helpers\Url::to(['public/login'])], ['class' => 'forgot']) ?>
                <?= Html::submitButton('找回密码', ['class' => 'btn-glow primary login']) ?>
            </div>
        </div>
        <?php $form = ActiveForm::end() ?>
    </div>
    <!-- scripts -->
