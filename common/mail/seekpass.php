
<p>您好<?php echo $adminuser?>,您的找回链接如下</p>

<?php $url = Yii::$app->urlManager->createAbsoluteUrl(['manage/mailchangepass','timestamp'=>$time,'adminuser'=>$adminuser,'token'=>$token])?>
<a href="<?=$url?>"><?=$url?></a>
<p>该链接5分钟内有效</p>
<p>该邮件为系统自动发送，请勿回复</p>