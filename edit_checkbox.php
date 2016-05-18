<?
	$id = $_GET['id'];
	$value = $_GET['value'];

	include('conn.php');
	mysql_select_db('shopping');

	$sql = "update products set Status = ".$value." where PID = ".$id;
	$result = mysql_query($sql);
	if($result) echo "success";
	else echo "error";
?>