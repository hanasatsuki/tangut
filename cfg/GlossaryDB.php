<?php
include('GlossaryBean.php'); //引入bean
include('ConnectDB.php'); //引入DB connection資訊
include('../model/select.php'); //查詢

//透過俄文編號查詢
function select($russian){
    $glossaryBean = new GlossaryBean;
    $connectDB = new ConnectDB;
//查詢
    $query = "SELECT russian_serial, g.russian, `character`, phonetics, meaning FROM glossary g JOIN tangut t ON g.russian = t.russian where g.russian = $russian";
    $conn = $connectDB->sql_connect();
    $result = mysqli_query($conn,$query);

        if (mysqli_num_rows($result) > 0) {
            echo "<form action='update.php' method='get'>";
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
                echo "<td style='border:1px solid #004085'><a href=../model/update.php?m=$russian_serial_while>更改</a></td>";
                echo "</tr>";
            }
            echo "</table>";
            echo "</form>";
        } else {
            echo "0 results";
        }

$conn->close();
    return $result;
}

//透過俄文編號流水號查詢細節(以利修改)
function select_by_russian_serial($russian_serial){
    $glossaryBean = new GlossaryBean;
    $connectDB = new ConnectDB;
    $query = "SELECT russian_serial,russian,meaning,functionword,transliterate,unknownword,propername,combineword,notes,original FROM `glossary` WHERE russian_serial='$russian_serial'";
    $conn = $connectDB->sql_connect();
    $result = mysqli_query($conn,$query);

    $conn->close();
    return $result;
}

//修改
function update($russian_serial, $meaning, $functionword, $transliterate, $unknownword, $propername, $combineword, $notes, $original){
    $glossaryBean = new GlossaryBean();
    $connectDB = new ConnectDB();
    $query = "UPDATE glossary SET meaning='$meaning', `functionword`=$functionword, transliterate=$transliterate, unknownword=$unknownword, propername=$propername, combineword=$combineword, notes='$notes', original='$original' WHERE russian_serial='$russian_serial'";
    $conn = $connectDB -> sql_connect();
    $result_of_update = mysqli_query($conn,$query);

    if($result_of_update != 1){
        echo "Error updating record: " . $conn->error;
    } else{
        return $result_of_update;
    }
}

//新增
function insert($russian_serial,$russian,$meaning,$functionword,$transliterate,$unknownword,$propername,$combineword,$notes){
    $glossaryBean = new GlossaryBean();
    $connectDB = new ConnectDB();
    $query = "INSERT INTO glossary(russian_serial,russian,meaning,functionword,transliterate,unknownword,propername,combineword,notes,original) VALUES ('$russian_serial','$russian','$meaning','$functionword','$transliterate','$unknownword','$propername','$combineword','$notes','龔')";
    $conn = $connectDB -> sql_connect();
    $result_of_insert = mysqli_query($conn,$query);

    if ($result_of_insert == 1) {
        echo "輸入完成<br>";
        //顯示結果
        echo "資料庫流水號：".$russian_serial."<br>";
        echo "俄文編號：".$russian."<br>";
        echo "對譯漢字：".$meaning."<br>";
        echo $functionword."<br>";
        echo $transliterate."<br>";
        echo $unknownword."<br>";
        echo $propername."<br>";
        echo $combineword."<br>";
        echo $notes."<br>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);

}

?>