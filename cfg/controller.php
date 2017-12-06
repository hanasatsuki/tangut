<?php
include('GlossaryDB.php');


$russian = $_POST['russian'];
echo "您輸入的俄文編號是$russian<br>";

if(strlen($russian)==4){
    $result = select($russian);

    if (mysqli_num_rows($result) > 0) {
        echo "<form action='revise.php' method='get'>";
        echo "<table style='border:1px solid #004085'><tr style='border:1px solid #004085'><th style='border:1px solid #004085'>流水號</th><th style='border:1px solid #004085'>俄文編號</th><th style='border:1px solid #004085'>西夏字</th><th style='border:1px solid #004085'>擬音</th><th style='border:1px solid #004085'>對譯漢字</th></tr>";
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $russian_serial_while=$row['russian_serial'];
            $russian_while = $row["russian"];
            $character_while = $row["character"];
            $phonetics_while = $row["phonetics"];
            $meaning_while = $row["meaning"];

            echo "<tr style='border:1px solid #004085'>";
            echo "<td style='border:1px solid #004085'>".$row["russian_serial"]."<input type='hidden' name='$russian_serial_while' ></td>";
            echo "<td style='border:1px solid #004085'>".$row["russian"]."<input type='hidden' name='$russian_while' ></td>";
            echo "<td style='border:1px solid #004085'><text styLe='font-family:西夏文'>".$row["character"]."</text><input type='hidden' name='$character_while' ></td>";
            echo "<td style='border:1px solid #004085'>".$row["phonetics"]."<input type='hidden' name='$phonetics_while' ></td>";
            echo "<td style='border:1px solid #004085'>".$row["meaning"]."<input type='hidden' name='$meaning_while' ></td>";
            echo "<td style='border:1px solid #004085'><input type='submit' value='revise' action='revise.php'></td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</form>";
    } else {
        echo "0 results";
    }
}else{
    echo "請輸入正確格式";
}


?>


<script>

    function revise() {
        var rev = document.getElementsByTagName('input');
        var rev_id = rev[2].id;
        //alert(rev_id);
        document.getElementsByTagName('input')[2].id.action='revise.php?id='rev_id;


        rev_id.submit();
    }

</script>