<?php
include_once "Message.php";
include_once "DB.php";
$db = db::GetInstance();
$pdo = $db->connect_db('05');
$msg = new Message();
$arr = $_POST;
$data = $msg->add($pdo,'message',$arr);
if($data == 1)
{
	echo "<script>alert('留言成功');location.href='message_list.php';</script>";
}else{
	echo "<script>alert('留言失败');location.href='message.html';</script>";
}
?>