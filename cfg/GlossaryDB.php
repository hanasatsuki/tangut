<?php
include('GlossaryBean.php');
include('ConnectDB.php');

$glossaryBean = new GlossaryBean;
$connectDB = new ConnectDB;


//查詢
$query = "SELECT russian_serial, g.russian, `character`, phonetics, meaning FROM glossary g JOIN tangut t ON g.russian = t.russian";
$conn = $connectDB->sql_connect();
$result = mysqli_query($conn,$query);

if (mysqli_num_rows($result) > 0) {
    echo "<table style='border:1px solid #004085'><tr style='border:1px solid #004085'><th style='border:1px solid #004085'>流水號</th><th style='border:1px solid #004085'>俄文編號</th><th style='border:1px solid #004085'>西夏字</th><th style='border:1px solid #004085'>擬音</th><th style='border:1px solid #004085'>對譯漢字</th></tr>";
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr style='border:1px solid #004085'>";
        echo "<td style='border:1px solid #004085'>".$row["russian_serial"]."</td>";
        echo "<td style='border:1px solid #004085'>".$row["russian"]."</td>";
        echo "<td style='border:1px solid #004085'><text styLe='font-family:西夏文'>".$row["character"]."</text></td>";
        echo "<td style='border:1px solid #004085'>".$row["phonetics"]."</td>";
        echo "<td style='border:1px solid #004085'>".$row["meaning"]."</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>