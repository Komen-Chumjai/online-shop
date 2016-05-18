<?
	$id = $_GET['id'];

	include('conn.php');
	//mysql_select_db('shopping');
	mysql_select_db('acsm_66b66b66c4075da');

	$result = mysql_query("select fileType, fileContent from products where PID = $id")or die(mysql_error());
	$type = mysql_result($result, 0, 'fileType');
	$content = mysql_result($result, 0, 'fileContent');

	// header("content-Disposition: attachment; filename=aaa.jpg");
	header("Content-type: $type");
	echo $content;
?>