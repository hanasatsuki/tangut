<?php

include('../header.php');
?>

<br>
<script>

    /*
    *     var pattern = /^(\d+)$/;  // 0-9
    var result = pattern.test(INPUT);
    return result;
    * */
    function validNum(){
        var rn = document.getElementById("russiannumber").value;
        var pattern = /^(\d+)$/;  // 0-9
        //var result = pattern.test(rn);
        if(!pattern.test(rn)){
            alert("您輸入的是「" + rn + "」，俄文編號欄位請輸入數字。");
            russiannumber.value="";
        }
        if(rn.length!=4){
            alert("您輸入的是「" + rn + "」，字元數為" + rn.length + "，需輸入剛剛好4個字元。");
            russiannumber.value="";
        }
    }

</script>
<div style="margin:20px 40px">
    <h4>西夏文對譯漢字輸入介面</h4>
<form action="insertglos.php" method="post">
    俄文編號：<input id="russiannumber" type="text" name="russian" size="4" onblur="validNum()"> (皆為四碼數字)<br>
    對譯漢字：<input type="text" name="meaning" size="4"> (儘可能輸入一個漢字就好)<br>
    是否為虛詞：<input type="radio" value="1" name="fc">是　<input type="radio" value="0" name="fc" checked>否<br>
    是否為對音/借詞：<input type="radio" value="1" name="ph">是　<input type="radio" value="0" name="ph" checked>否<br>
    是否意義不明：<input type="radio" value="1" name="uk">是　<input type="radio" value="0" name="uk" checked>否<br>
    是否用於專名：<input type="radio" value="1" name="pn">是　<input type="radio" value="0" name="pn" checked>否<br>
    是否複合詞：<input type="radio" value="1" name="cw">是　<input type="radio" value="0" name="cw" checked>否<br>
    備註：<input type="text" placeholder="可輸入字典裡的其他註記" size="30" name="notes"><br>
    <input type="submit" value="送出"> <input type="reset" value="清除"><br>
</form>
</div>

