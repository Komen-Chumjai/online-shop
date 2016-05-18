<?
	include('conn.php');
	mysql_select_db('shopping');
	mysql_query('set names utf8');

	$email = $_GET['email'];
	$sql = "select OrderID from orders where Email = '".$email."'";
	$result = mysql_query($sql)or die(mysql_error());

	mysql_query("delete from orders where Email = '".$email."'")or die(mysql_error());

	while($data = mysql_fetch_array($result)){
		$sql = "delete from orders_detail where OrderID = ".$data[OrderID];
		mysql_query($sql)or die(mysql_error());
	}
?>
<script type="text/javascript">
	window.location = "display_buying.php";
</script>