<?php
include_once "DB.php";
include_once "User.php";
$name = $_POST['name'];
$pwd = $_POST['pwd'];
$db = db::GetInstance();
$pdo = $db->connect_db('05');
$user = new User();
$data = $user->login($pdo,$name,$pwd);
if($data == 1){
	echo "<script>alert('登录失败，用户名不存在');location.href='login.html'</script>";
}elseif($data == 2){
	setcookie('name',$name);
	echo "<script>alert('登录成功');location.href='message.html'</script>";
}else{
	echo "<script>alert('登录失败');location.href='login.html'</script>";
}
?>