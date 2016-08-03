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
    <form id="w0" action="/index.php?r=admin/public/login" method="post" role="form">
        <input type="hidden" name="_csrf" value="VGVVTVVZb0UmKzIrLWtCL2VdNB0tLxoQJVU0AQA6JzMwIgQ0Zy0sNw==">
        <div class="span4 box">
            <div class="content-wrap">
                <h6>慕课商城 - 后台管理</h6>
                <div class="form-group field-admin-adminuser">
                    <p class="help-block help-block-error"></p>
                    <input type="text" id="admin-adminuser" class="span12" name="Admin[adminuser]" placeholder="管理员账号"></div>
                <div class="form-group field-admin-adminpass">
                    <p class="help-block help-block-error"></p>
                    <input type="password" id="admin-adminpass" class="span12" name="Admin[adminpass]" placeholder="管理员密码"></div>
                <a href="/index.php?r=admin%2Fpublic%2Fseekpassword" class="forgot">忘记密码?</a>
                <div class="form-group field-remember-me">
                    <div class="remember">
                        <input type="hidden" name="Admin[rememberMe]" value="0">
                        <input type="checkbox" id="remember-me" name="Admin[rememberMe]" value="1" checked>
                        <label for="remember-me">记住我</label></div>
                </div>
                <button type="submit" class="btn-glow primary login">登录</button></div>
        </div>
    </form>
</div>
