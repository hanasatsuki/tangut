<?php
include('../cfg/GlossaryDB.php');


//接收表單資料
$russian_serial = $_POST['russian_serial']; //俄文編號

$resule_of_delete = delete($russian_serial);
$russian = substr($russian_serial,0,4);
select_by_russian($russian);

echo "已經刪除".$resule_of_delete."筆資料!";

?>




