<?php
    use yii\helpers\Url;
    $this->title = 'My Yii Application';
?>
<form action="<?=Url::to(['login'])?>" method="post">
    <p>用户名：<input type="text" name="username"></p>
    <p>密码：<input type="password" name="password"></p>
    <p><input type="submit" value="登录"></p>
</form>