<?php
include('../header.php');
?>
<br>
<br>
<div style="margin:0 80px">
<form action="/project/cfg/Controller.php" method="post">
請輸入俄文編號或漢譯：<input type="text" name="advanced"><br>
特殊查詢：
    <input type="radio" value="虛詞" name="advanced">虛詞　
    <input type="radio" value="對音" name="advanced">對音　
    <input type="radio" value="意義不明" name="advanced">意義不明　
    <input type="radio" value="專名" name="advanced">專名　
    <input type="radio" value="複合詞" name="advanced">複合詞　
    <input type="submit" value="查詢" name="select">
</form>
<br>
</div>
<hr>
