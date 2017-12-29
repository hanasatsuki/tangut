<?php
include('../header.php');
?>
<br>
<br>
<h4>請輸入俄文編號</h4>
<form action="" method="post">
    <input type="text" name="russian">
    <input type="submit" value="submit">
</form>

<?php
$russian = $_POST['russian'];
//echo "<p style='margin:0 80px;padding:0 80px;'>您輸入的俄文編號是".$russian."</p>";

include('cfg.php');


$sql = "SELECT russian_serial, g.russian, `character`, phonetics, meaning FROM glossary g JOIN tangut t ON g.russian = t.russian WHERE g.russian= '$russian'";
$result = mysqli_query($conn, $sql);

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
