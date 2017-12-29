<?php
include('../cfg/GlossaryDB.php');

$russian_serial = $_GET['m'];
//echo "russian_serial = $russian_serial";

//查詢該筆資料

$result = select_by_russian_serial($russian_serial);

$row = mysqli_fetch_assoc($result);?>

<form action="deleteglos.php" method="post">
    <table>
        <tr>
            <td>俄文流水號</td>
            <td><input type="hidden" name="russian_serial" value="<?php echo $row["russian_serial"];?>"><?php echo $row["russian_serial"];?></td>
        </tr>
        <tr>
            <td>對譯漢字</td>
            <td><?php echo $row["meaning"];?></td>
        </tr>
        <tr>
            <td>是否虛字</td>
            <td>
                <?php if ($row["functionword"]==1){
                    echo '是';
                }else{
                    echo '否';} ?>
            </td>
        </tr>
        <tr>
            <td>是否對音</td>
            <td>
                <?php if ($row["transliterate"]==1){
                    echo '是';
                }else{
                    echo '否';} ?>
            </td>
        </tr>
        <tr>
            <td>是否意義不明</td>
            <td>
                <?php if ($row["unknownword"]==1){
                    echo '是';
                }else{
                    echo '否';} ?>
            </td>
        </tr>
        <tr>
            <td>是否用於專名</td>
            <td>
                <?php if ($row["propername"]==1){
                    echo '是';
                }else{
                    echo '否';} ?>
            </td>
        </tr>
        <tr>
            <td>是否複合詞</td>
            <td>
                <?php if ($row["combineword"]==1){
                    echo '是';
                }else{
                    echo '否';} ?>
            </td>
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
    <input type="submit" value="確認刪除">
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