<?php
/**
 * Created by PhpStorm.
 * User: Edwin
 * Date: 2016/8/3
 * Time: 20:31
 */
?>
<div class="row-fluid login-wrapper">
    <a class="brand" href="index.html"></a>
    <form id="w0" action="/index.php?r=admin%2Fpublic%2Fseekpassword" method="post" role="form">
        <input type="hidden" name="_csrf" value="YW1ZZHZ4el8TIz4CDkpXNVBVODQODg8KEF04KCMbMikFKggdRAw5LQ==">
        <div class="span4 box">
            <div class="content-wrap">
                <h6>慕课商城 - 找回密码</h6>
                <div class="form-group field-admin-adminuser">
                    <p class="help-block help-block-error"></p>
                    <input type="text" id="admin-adminuser" class="span12" name="Admin[adminuser]" placeholder="管理员账号"></div>
                <div class="form-group field-admin-adminemail">
                    <p class="help-block help-block-error"></p>
                    <input type="text" id="admin-adminemail" class="span12" name="Admin[adminemail]" placeholder="管理员电子邮箱"></div>
                <a href="/index.php?r=admin%2Fpublic%2Flogin" class="forgot">返回登录</a>
                <button type="submit" class="btn-glow primary login">找回密码</button></div>
        </div>
    </form>
</div>
<!-- scripts -->
