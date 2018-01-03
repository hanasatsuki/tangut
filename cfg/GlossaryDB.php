<?php
include('GlossaryBean.php'); //引入bean
include('ConnectDB.php'); //引入DB connection資訊
include('../model/select.php'); //查詢



//透過漢譯查詢
function select_by_meaning($meaning){
    $query = "SELECT russian_serial, g.russian, `character`, phonetics, meaning, functionword, verbaffix, personword, transliterate, borrowword FROM glossary g RIGHT JOIN tangut t ON g.russian = t.russian where g.meaning like '%$meaning%'";
    select($query);
}
//透過俄文編號查詢
function select_by_russian($russian){
    $query = "SELECT russian_serial, g.russian, `character`, phonetics, meaning, functionword, verbaffix, personword, transliterate, borrowword FROM glossary g RIGHT JOIN tangut t ON g.russian = t.russian where g.russian = $russian";
    select($query);
}

//查詢是否為虛詞
function select_if_functionword(){
    $query = "SELECT russian_serial, g.russian, `character`, phonetics, meaning, functionword, verbaffix, personword, transliterate, borrowword FROM glossary g RIGHT JOIN tangut t ON g.russian = t.russian where g.functionword = 1";
    select($query);
}

//查詢是否動詞詞綴
function select_if_verbaffix(){
    $query = "SELECT russian_serial, g.russian, `character`, phonetics, meaning, functionword, verbaffix, personword, transliterate, borrowword FROM glossary g RIGHT JOIN tangut t ON g.russian = t.russian where g.verbaffix = 1";
    select($query);
}

//查詢是否人稱詞
function select_if_personword(){
    $query = "SELECT russian_serial, g.russian, `character`, phonetics, meaning, functionword, verbaffix, personword, transliterate, borrowword FROM glossary g RIGHT JOIN tangut t ON g.russian = t.russian where g.personword = 1";
    select($query);
}

//查詢是否對音
function select_if_transliterate(){
    $query = "SELECT russian_serial, g.russian, `character`, phonetics, meaning, functionword, verbaffix, personword, transliterate, borrowword FROM glossary g RIGHT JOIN tangut t ON g.russian = t.russian where g.transliterate = 1";
    select($query);
}

//查詢是否借詞
function select_if_borrowword(){
    $query = "SELECT russian_serial, g.russian, `character`, phonetics, meaning, functionword, verbaffix, personword, transliterate, borrowword FROM glossary g RIGHT JOIN tangut t ON g.russian = t.russian where g.borrowword = 1";
    select($query);
}
//查詢是否意義不明
function select_if_unknownword(){
    $query = "SELECT russian_serial, g.russian, `character`, phonetics, meaning, functionword, verbaffix, personword, transliterate, borrowword FROM glossary g RIGHT JOIN tangut t ON g.russian = t.russian where g.unknownword = 1";
    select($query);
}

//查詢是否專名
function select_if_propername(){
    $query = "SELECT russian_serial, g.russian, `character`, phonetics, meaning, functionword, verbaffix, personword, transliterate, borrowword FROM glossary g RIGHT JOIN tangut t ON g.russian = t.russian where g.propername = 1";
    select($query);
}

//查詢是否複合詞
function select_if_combineword(){
    $query = "SELECT russian_serial, g.russian, `character`, phonetics, meaning, functionword, verbaffix, personword, transliterate, borrowword FROM glossary g RIGHT JOIN tangut t ON g.russian = t.russian where g.combineword = 1";
    select($query);
}

//查詢(基本方法)
function select($query){
    $glossaryBean = new GlossaryBean;
    $connectDB = new ConnectDB;
    $conn = $connectDB->sql_connect();
    $result = mysqli_query($conn,$query);

        if (mysqli_num_rows($result) > 0) {
            echo "<form action='update.php' method='get'>";
            echo "<table style='margin:0 80px;border:1px solid #004085'><tr style='border:1px solid #004085'><th style='border:1px solid #004085'>流水號</th><th style='border:1px solid #004085'>俄文編號</th><th style='border:1px solid #004085'>西夏字</th><th style='border:1px solid #004085'>擬音</th><th style='border:1px solid #004085'>對譯漢字</th><th style='border:1px solid #004085'>是否虛詞</th><th style='border:1px solid #004085'>是否動詞詞頭</th><th style='border:1px solid #004085'>是否人稱詞</th><th style='border:1px solid #004085'>是否對音</th><th style='border:1px solid #004085'>是否借詞</th><th style='border:1px solid #004085'>修改</th><th style='border:1px solid #004085'>刪除</th></tr>";
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                $russian_serial_while=$row["russian_serial"];
                echo "<tr style='border:1px solid #004085'>";
                echo "<td style='border:1px solid #004085'>".$row["russian_serial"]."<input type='hidden' name='$russian_serial_while' ></td>";
                echo "<td style='border:1px solid #004085'>".$row["russian"]."</td>";
                echo "<td style='border:1px solid #004085'><text styLe='font-size:200%;font-family:西夏文'>".$row["character"]."</text></td>";
                echo "<td style='border:1px solid #004085'>".$row["phonetics"]."</td>";
                echo "<td style='border:1px solid #004085'>".$row["meaning"]."</td>";
                if($row["functionword"]==1){
                    echo "<td style='border:1px solid #004085'>Y</td>";
                } else{
                    echo "<td style='border:1px solid #004085'>N</td>";
                }
                if($row["verbaffix"]==1){
                    echo "<td style='border:1px solid #004085'>Y</td>";
                } else{
                    echo "<td style='border:1px solid #004085'>N</td>";
                }
                if($row["personword"]==1){
                    echo "<td style='border:1px solid #004085'>Y</td>";
                } else{
                    echo "<td style='border:1px solid #004085'>N</td>";
                }
                if($row["transliterate"]==1){
                    echo "<td style='border:1px solid #004085'>Y</td>";
                } else{
                    echo "<td style='border:1px solid #004085'>N</td>";
                }
                if($row["borrowword"]==1){
                    echo "<td style='border:1px solid #004085'>Y</td>";
                } else{
                    echo "<td style='border:1px solid #004085'>N</td>";
                }
                echo "<td style='border:1px solid #004085'><a href=../model/update.php?m=$russian_serial_while>修改</a></td>";
                echo "<td style='border:1px solid #004085'><a href=../model/delete.php?m=$russian_serial_while>刪除</a></td>";
                echo "</tr>";
            }
            echo "</table>";
            echo "</form>";
        } else {
            echo "0 results!!";
        }

$conn->close();
    return $result;
}

//透過俄文編號流水號查詢細節(以利修改)
function select_by_russian_serial($russian_serial){
    $glossaryBean = new GlossaryBean;
    $connectDB = new ConnectDB;
    $query = "SELECT russian_serial,russian,meaning,functionword,verbaffix,personword,transliterate,borrowword,unknownword,propername,combineword,notes,original FROM `glossary` WHERE russian_serial='$russian_serial'";
    $conn = $connectDB->sql_connect();
    $result = mysqli_query($conn,$query);

    $conn->close();
    return $result;
}

//修改
function update($russian_serial, $meaning, $functionword, $verbaffix, $personword, $transliterate, $borrowword, $unknownword, $propername, $combineword, $notes, $original){
    $glossaryBean = new GlossaryBean();
    $connectDB = new ConnectDB();
    $query = "UPDATE glossary SET meaning='$meaning', `functionword`=$functionword, verbaffix = $verbaffix, personword=$personword, transliterate=$transliterate, borrowword=$borrowword, unknownword=$unknownword, propername=$propername, combineword=$combineword, notes='$notes', original='$original' WHERE russian_serial='$russian_serial'";
    $conn = $connectDB -> sql_connect();
    $result_of_update = mysqli_query($conn,$query);

    if($result_of_update != 1){
        echo "Error updating record: " . $conn->error;
    } else{
        return $result_of_update;
    }
}

//新增
function insert($russian_serial, $russian, $meaning, $functionword, $verbaffix, $personword, $transliterate, $borrowword, $unknownword, $propername, $combineword, $notes){
    $glossaryBean = new GlossaryBean();
    $connectDB = new ConnectDB();
    $query = "INSERT INTO glossary(russian_serial,russian,meaning,functionword,verbaffix,personword,transliterate,borrowword,unknownword,propername,combineword,notes,original) VALUES ('$russian_serial','$russian','$meaning','$functionword','$verbaffix','$personword','$transliterate','$borrowword','$unknownword','$propername','$combineword','$notes','龔')";
    $conn = $connectDB -> sql_connect();
    $result_of_insert = mysqli_query($conn,$query);
    if ($result_of_insert == 1) {
        return $result_of_insert;
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
}

//刪除
function delete($russian_serial){
    $glossaryBean = new GlossaryBean();
    $connectDB = new ConnectDB();
    $query = "DELETE FROM glossary WHERE russian_serial='$russian_serial'";
    $conn = $connectDB -> sql_connect();
    $result_of_delete = mysqli_query($conn,$query);
    if ($result_of_delete == 1) {
        echo "刪除完成<br>";
        return $result_of_delete;
    } else{
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>