<?php
include('GlossaryDB.php');


$russian = $_POST['russian'];
echo "您輸入的俄文編號是$russian<br>";

if(strlen($russian)==4 & (int)$russian){
    select($russian);
}else{
    echo "請輸入正確格式";
}

?>