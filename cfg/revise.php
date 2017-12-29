<?php
include('GlossaryDB.php');

$russian_serial = $_GET['m'];
//echo "russian_serial = $russian_serial";

//查詢該筆資料

$result = select_by_russian_serial($russian_serial);

$row = mysqli_fetch_assoc($result);?>

<form action="update.php">
    <table>
        <tr>
            <td>資料庫流水號</td>
            <td><?php echo $row["russian_serial"];?></td>
        </tr>
        <tr>
            <td>對譯漢字</td>
            <td><?php echo $row["meaning"];?></td>
        </tr>
        <tr>
            <td>是否虛字</td>
            <td><?php echo $row["functionword"];?></td>
        </tr>
        <tr>
            <td>是否對音</td>
            <td><?php echo $row["transliterate"];?></td>
        </tr>
        <tr>
            <td>是否未知</td>
            <td><?php echo $row["unknownword"]; ?></td>
        </tr>
        <tr>
            <td>是否複合詞</td>
            <td><?php echo $row["combineword"];?></td>
        </tr>
        <tr>
            <td>備註</td>
            <td><?php echo $row["notes"];?></td>
        </tr>
        <tr>
            <td>出處</td>
            <td><?php echo $row["original"];?></td>
        </tr>
    </table>
</form>
<?php
/*
    echo "資料庫流水號：".$row["russian_serial"]."<br>";
    echo "對譯漢字：".$row["meaning"]."<input type='text' name='meaning'>"."<br>";
    echo "是否虛字：(".$row["functionword"]."<input type='radio' value='1' name='fc'>是　<input type='radio' value='0' name='fc' checked>否"."<br>";
    echo "是否對音：".$row["transliterate"]."<input type='text' name='transliterate'>"."<br>";
    echo "是否未知：".$row["unknownword"]."<input type='text' name='unknownword'>"."<br>";
    echo "是否複合詞：".$row["combineword"]."<input type='text' name='combineword'>"."<br>";
    echo "備註：".$row["notes"]."<input type='text' name='meaning'>"."<br>";
    echo "出處：".$row["original"]."<input type='text' name='meaning'>"."<br>";
    echo "<br>原資料:".$row["meaning"]."<input type='text' name='meaning'>";
 * */

?>