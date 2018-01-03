<?php
include('GlossaryDB.php');

$advanced = $_POST['advanced'];

if($advanced!=null) {
    if (is_numeric($advanced)) {

        if (strlen($advanced) == 4 and $advanced < 5800 and $advanced > 0) {
            echo "您輸入的俄文編號是$advanced<br>";
            $russian = $advanced;
            select_by_russian($russian);
        } else {
            echo "請輸入正確格式";
        }
    }
    else if($advanced=="虛詞"){
        select_if_functionword();
    }
    else if($advanced=="動詞詞綴"){
        select_if_verbaffix();
    }
    else if($advanced=="人稱詞"){
        select_if_personword();
    }
    else if($advanced=="對音"){
        select_if_transliterate();
    }
    else if($advanced=="借詞"){
        select_if_borrowword();
    }
    else if($advanced=="意義不明"){
        select_if_unknownword();
    }
    else if($advanced=="專名"){
        select_if_propername();
    }
    else if($advanced=="複合詞"){
        select_if_combineword();
    }
    else {
        echo "您要查詢「".$advanced."」<br>";
        $meaning = $advanced;
        select_by_meaning($advanced);
    }
}
?>
