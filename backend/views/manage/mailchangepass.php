<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use backend\models\Admin;
?>


<div class="row-fluid login-wrapper">
    <a class="brand" href=""></a>
    <form>
        <?$form = ActiveForm::begin(['fieldConfig' => ['template' => '{error}{input}']])?>
        <div class="span4 box" style="margin 0!important;">
            <div class="content-wrap">
                <h6>商城 - 修改密码</h6>
                <?=$form->field($model,'adminuser')->hiddenInput()?>
                <?=$form->field($model,'adminpass')->passwordInput(['class'=>'span12','placeholder'=>'新密码'])?>
                <?=$form->field($model,'repass')->passwordInput(['class'=>'span12','placeholder'=>'确认密码'])?>
                <?=Html::a('返回登陆',[yii\helpers\Url::to(['public/login'])],['class'=>'forgot'])?>
                <?=Html::submitButton('修改',['class'=>'btn-glow primary login'])?>
            </div>
        </div>
    <?$form = ActiveForm::end()?>
</div>

<!-- scripts -->