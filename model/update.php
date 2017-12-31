<?php
include('../cfg/GlossaryDB.php');

$russian_serial = $_GET['m'];
//echo "russian_serial = $russian_serial";

//查詢該筆資料

$result = select_by_russian_serial($russian_serial);

$row = mysqli_fetch_assoc($result);?>

<form action="updateglos.php" method="post">
    <table>
        <tr>
            <td>俄文流水號</td>
            <td><input type="hidden" name="russian_serial" value="<?php echo $row["russian_serial"];?>"><?php echo $row["russian_serial"];?></td>
        </tr>
        <tr>
            <td>對譯漢字</td>
            <td><input type="text" name="meaning" value="<?php echo $row["meaning"];?>"></td>
        </tr>
        <tr>
            <td>是否虛字</td>
            <td>
                <?php if ($row["functionword"]==1){
                    echo '<input type="radio" value="1" name="fc" checked>是 <input type="radio" value="0" name="fc">否';}else{
                    echo '<input type="radio" value="1" name="fc">是 <input type="radio" value="0" name="fc" checked>否';} ?>
            </td>
        </tr>
        <tr>
            <td>是否對音</td>
            <td>
                <?php if ($row["transliterate"]==1){
                    echo '<input type="radio" value="1" name="ph" checked>是 <input type="radio" value="0" name="ph">否';}else{
                    echo '<input type="radio" value="1" name="ph">是 <input type="radio" value="0" name="ph" checked>否';} ?>
            </td>
        </tr>
        <tr>
            <td>是否借詞</td>
            <td>
                <?php if ($row["borrowword"]==1){
                    echo '<input type="radio" value="1" name="bw" checked>是 <input type="radio" value="0" name="bw">否';}else{
                    echo '<input type="radio" value="1" name="bw">是 <input type="radio" value="0" name="bw" checked>否';} ?>
            </td>
        </tr>
        <tr>
            <td>是否意義不明</td>
            <td>
                <?php if ($row["unknownword"]==1){
                    echo '<input type="radio" value="1" name="uk" checked>是 <input type="radio" value="0" name="uk">否';}else{
                    echo '<input type="radio" value="1" name="uk">是 <input type="radio" value="0" name="uk" checked>否';} ?>
            </td>
        </tr>
        <tr>
            <td>是否用於專名</td>
            <td>
                <?php if ($row["propername"]==1){
                    echo '<input type="radio" value="1" name="pn" checked>是 <input type="radio" value="0" name="pn">否';}else{
                    echo '<input type="radio" value="1" name="pn">是 <input type="radio" value="0" name="pn" checked>否';} ?>
            </td>
        </tr>
        <tr>
            <td>是否複合詞</td>
            <td>
                <?php if ($row["combineword"]==1){
                    echo '<input type="radio" value="1" name="cw" checked>是 <input type="radio" value="0" name="cw">否';}else{
                    echo '<input type="radio" value="1" name="cw">是 <input type="radio" value="0" name="cw" checked>否';} ?>
            </td>
        </tr>
        <tr>
            <td>備註</td>
            <td><input type="text" name="notes" value="<?php echo $row["notes"];?>"></td>
        </tr>
        <tr>
            <td>出處</td>
            <td><input type="text" name="original" value="<?php echo $row["original"];?>"></td>
        </tr>
    </table>
    <input type="submit" value="確認修改">
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