<?php
include('../cfg/GlossaryDB.php');


//接收表單資料
$russian_serial = $_POST['russian_serial']; //俄文編號
$meaning = $_POST['meaning']; //對譯漢字
$functionword = $_POST['fc']; //虛詞
$transliterate = $_POST['ph']; //對音
$unknownword = $_POST['uk']; //未知
$propername = $_POST['pn']; //專有名詞
$combineword = $_POST['cw']; //複合詞
$notes = $_POST['notes']; //備註
$original = $_POST['original']; //出處

echo "MEANING=".$meaning;
$resule_of_update = update($russian_serial, $meaning, $functionword, $transliterate, $unknownword, $propername, $combineword, $notes, $original);
echo "RESULT_OF_UPDATE==".$resule_of_update;
/*if ($result_of_update) {
    echo "輸入完成";
    //顯示結果
    echo "資料庫流水號：".$russian_serial."<br>";
    echo "對譯漢字：".$meaning."<br>";
    echo $functionword."<br>";
    echo $transliterate."<br>";
    echo $unknownword."<br>";
    echo $propername."<br>";
    echo $combineword."<br>";
    echo $notes."<br>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}*/

?>



