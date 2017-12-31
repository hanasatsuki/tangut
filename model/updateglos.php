<?php
include('../cfg/GlossaryDB.php');


//接收表單資料
$russian_serial = $_POST['russian_serial']; //俄文編號
$meaning = $_POST['meaning']; //對譯漢字
$functionword = $_POST['fc']; //虛詞
$transliterate = $_POST['ph']; //對音
$borrowword = $_POST['bw']; //借詞
$unknownword = $_POST['uk']; //未知
$propername = $_POST['pn']; //專有名詞
$combineword = $_POST['cw']; //複合詞
$notes = $_POST['notes']; //備註
$original = $_POST['original']; //出處


$resule_of_update = update($russian_serial, $meaning, $functionword, $transliterate, $borrowword, $unknownword, $propername, $combineword, $notes, $original);
$russian = substr($russian_serial,0,4);
select_by_russian($russian);
echo "已經修改".$resule_of_update."筆資料!";

?>



