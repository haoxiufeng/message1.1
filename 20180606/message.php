<?php
header("content-type:text/html;charset=utf8");
class Message
{
    public function add($pdo, $table_name, $arr)
    {
        $time = time();
        $key = '';
        $val = '';
        $arr['time'] = $time;
        $arr['name'] = $_COOKIE['name'];
        foreach ($arr as $item => $value) {
            $key .= $item . ',';
            $val .= "'" . $value . "'" . ',';
        }
        $sql = "insert into " . $table_name . "(" . trim($key, ',') . ") values(" . trim($val, ',') . ")";
        $res = $pdo->exec($sql);
        return $res;
    }
    public function del($pdo, $table_name, $id)
    {
        $sql = "delete from " . $table_name . " where id = '$id'";
        $res = $pdo->exec($sql);
        return $res;
    }
    public function findAll($pdo, $table_name)
    {
        $sql = "select * from " . $table_name . "";
        $data = $pdo->query($sql)->fetchAll();
        $arr = array();
        foreach ($data as $key => $value) {
            $arr[$key]['text'] = $data[$key]['text'];
            $arr[$key]['time'] = $data[$key]['time'];
            $arr[$key]['name'] = $data[$key]['name'];
        }
        return $arr;
    }
}