<?php
header("content-type:text/html;charset=utf8");
class User
{
    public function login($pdo, $name, $pwd)
    {
        $sql = "select * from login where name = '$name'";
        $data = $pdo->query($sql)->fetchAll();
        $arr = array();
        foreach ($data as $key => $value) {
            $arr['name'] = $data[$key]['name'];
            $arr['pwd'] = $data[$key]['pwd'];
        }
        if ($arr == null) {
            return 1;
        } elseif ($arr['pwd'] == $pwd) {
            return 2;
        } else {
            return 3;
        }
    }
    public function register($pdo, $table_name, $arr)
    {
        $key = '';
        $val = '';
        foreach ($arr as $item => $value) {
            $key .= $item . ',';
            $val .= "'" . $value . "'" . ',';
        }
        $sql = "insert into " . $table_name . "(" . trim($key, ',') . ") values(" . trim($val, ',') . ")";
        $res = $pdo->exec($sql);
        return $res;
    }
}
