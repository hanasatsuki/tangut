<?php

interface Ifunctions
{
    //以俄文編號查詢--進行中
    public function select_russian();
    //以對譯漢字查詢--未開發
    public function select_meaning();
    //輸入對譯漢字 insert: russian (俄文編號)
    public function insert_meaning();
    //更新資料 primary key: russian_serial
    public function update();
    //刪除資料 primary key: russian_serial
    public function delete();
}
?>