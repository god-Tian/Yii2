<?php
    use yii\helpers\Url;
    $this->title = 'My Yii Application';
?>
<script src="/backend/assets/jquery-3.2.1.min.js"></script>
<script>
    $(document).ready(function () {
        $('#btn').click(function (){
            var data = $('#data-form').serializeArray();
            console.log(data);
            $.post("<?=Url::to(['addsave']);?>", data, function (r){
                console.log(r);
                window.location.reload();
            })
        })
    })
</script>
<form action="" method="post" onsubmit="return false" id="data-form">
    留言：<textarea name="contents" id="" cols="30" rows="10"></textarea>
    <p><input type="submit" value="发布" id="btn"></p>
</form>
<div id="data-div">
    <?php foreach ($list as $v):?>
        <div>
            <p>用户：
                <?=$v['username']?>
            </p>
            <p>评论：
                <?=$v['contents']?>
                <a href="<?=Url::to(['delete', 'id' => $v['id']])?>">
                    <button>删除</button>
                </a>
            </p>
        </div>
    <?php endforeach;?>
</div>
