<?php

/* @var $this yii\web\View */
use yii\helpers\Url;

$this->title = 'My Yii Application';
?>
<style>
    p{
        margin-bottom: 40px;
    }
</style>
<form action="<?=Url::to(['addsave'])?>" method="post">
    <p>用户名：<input type="text" name="username"></p>
    <p>昵称：<input type="text" name="nickname"></p>
    <p><input type="submit" value="添加"></p>
</form>
