<?php
    //include('../header.php');
    include('../cfg/GlossaryDB.php');
?>
<div style="margin:20px 40px">
    <h4>西夏文對譯漢字輸入介面</h4>
<form action="insertglos.php" method="post">
    俄文編號：<input id="russiannumber" type="text" name="russian" size="4" onblur="validNum()"> (皆為四碼數字)<br>
    對譯漢字：<input type="text" name="meaning" size="4"> (儘可能輸入一個漢字就好)<br>
    是否為虛詞：<input type="radio" value="1" name="fc">是　<input type="radio" value="0" name="fc" checked>否<br>
    是否為對音：<input type="radio" value="1" name="ph">是　<input type="radio" value="0" name="ph" checked>否<br>
    是否為借詞：<input type="radio" value="1" name="bw">是　<input type="radio" value="0" name="bw" checked>否<br>
    是否意義不明：<input type="radio" value="1" name="uk">是　<input type="radio" value="0" name="uk" checked>否<br>
    是否用於專名：<input type="radio" value="1" name="pn">是　<input type="radio" value="0" name="pn" checked>否<br>
    是否複合詞：<input type="radio" value="1" name="cw">是　<input type="radio" value="0" name="cw" checked>否<br>
    備註：<input type="text" placeholder="可輸入字典裡的其他註記" size="30" name="notes"><br>
    <input type="submit" value="送出"> <input type="reset" value="清除"><br>
</form>
</div>
<?php
//$russian = $_POST['russian'];
//echo "您輸入的俄文編號是$russian<br>";

include('../cfg.php');

//接收表單資料
$russian = $_POST['russian']; //俄文編號
$meaning = $_POST['meaning']; //對譯漢字
$functionword = $_POST['fc']; //虛詞
$transliterate = $_POST['ph']; //對音
$borrowword = $_POST['bw'];  //借詞
$unknownword = $_POST['uk']; //未知
$propername = $_POST['pn']; //專有名詞
$combineword = $_POST['cw']; //複合詞
$notes = $_POST['notes']; //備註

//為了幫每個對譯漢字都有個編號，在這裡處理俄文編號之後添加的流水號
$sql = "SELECT russian FROM `glossary` where russian = $russian";
$result = mysqli_query($conn, $sql);
$russian_serial = $russian."-".(String)(mysqli_num_rows($result)+1);

//執行insert
$result_of_insert = insert($russian_serial,$russian,$meaning,$functionword,$transliterate,$borrowword,$unknownword,$propername,$combineword,$notes);

$russian = substr($russian_serial,0,4);
select_by_russian($russian);
echo "成功輸入".$result_of_insert."筆資料!";

?>


