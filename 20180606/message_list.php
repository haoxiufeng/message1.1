<?php
include_once "Message.php";
include_once "DB.php";
$db = db::GetInstance();
$pdo = $db->connect_db('05');
$msg = new Message();
$data = $msg->findAll($pdo, 'message');
?>
<center>
	<table border="1">
		<tr align="center">
			<td>留言</td>
			<td>时间</td>
			<td>留言人</td>
		</tr>
		<?php foreach($data as $key=>$val){?>
		<tr>
			<td><?php echo $val['text']?></td>
			<td><?php echo date("Y-m-d H:i:s",$val['time'])?></td>
			<td><?php echo $val['name']?></td>
		</tr>
		<?php }?>
	</table>
</center>