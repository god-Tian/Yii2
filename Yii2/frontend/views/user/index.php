<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'My Yii Application';
?>
<style>
    table{
        text-align: center;
    }
    th,td{
        width: 150px;
        text-align: center;
    }
</style>
<div class="site-index">
    <a href="<?=Url::to(['add'])?>"><button>添加</button></a><br><br>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>username</th>
            <th>nickname</th>
            <th>create_time</th>
            <th>update_time</th>
            <th colspan="2">del/update</th>
        </tr>
        <?php foreach($list as $v):?>
            <tr>
                <td><?=$v['username']?></td>
                <td><?=$v['nickname']?></td>
                <td><?=$v['create_time']?></td>
                <td><?=$v['update_time']?></td>
                <td>
                    <a href="<?=Url::to(['delete','id' => $v['id']])?>">删除</a>
                    <a href="<?=Url::to(['edit','id' => $v['id']])?>">修改</a>
                </td>
            </tr>
        <?php endforeach;?>
    </table>
</div>
