<?
	$id = $_GET['id'];

	include('conn.php');
	mysql_select_db('shopping');

	$sql = "delete from products where PID = ".$id;
	$result = mysql_query($sql)or die(mysql_error());
	if($result){
		?>
		<script type="text/javascript">
			window.location = "display_edit.php";
		</script>
		<?
	}
?>