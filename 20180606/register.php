<?php
	include_once "DB.php";
	include_once "User.php";
	$arr = $_POST;
	$db = db::GetInstance();
	$pdo = $db->connect_db('05');
	$user = new User();
	$data = $user->register($pdo,'login',$arr);
	if($data = 1){
		echo "<script>alert('注册成功');location.href='message.html';</script>";
	}
