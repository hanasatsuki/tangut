<?php
include('GlossaryBean.php'); //引入bean
include('ConnectDB.php'); //引入DB connection資訊
include('../select.php');


function select($russian){
    $glossaryBean = new GlossaryBean;
    $connectDB = new ConnectDB;
//查詢
    $query = "SELECT russian_serial, g.russian, `character`, phonetics, meaning FROM glossary g JOIN tangut t ON g.russian = t.russian where g.russian = $russian";
    $conn = $connectDB->sql_connect();
    $result = mysqli_query($conn,$query);

$conn->close();
    return $result;
}

function select_by_russian_serial($russian_serial){
    $glossaryBean = new GlossaryBean;
    $connectDB = new ConnectDB;
//查詢
    $query = "SELECT russian_serial,russian,meaning,functionword,transliterate,unknownword,propername,combineword,notes,original FROM `glossary` WHERE russian_serial='$russian_serial'";
    $conn = $connectDB->sql_connect();
    $result = mysqli_query($conn,$query);

    $conn->close();
    return $result;
}
?>