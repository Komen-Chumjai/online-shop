<?
	$id = $_POST['id'];

	include('conn.php');
	mysql_select_db('shopping');
	mysql_query("set names utf8");
	
	$pName = $_POST['name'];
	$pPrice = $_POST['price'];
	$pDetail = $_POST['detail'];
	// echo $_FILES['upfile']['name'];

	if($_FILES){
		if($_FILES['upfile']['error'] != 0){
			$sql = "update products set PName = '".$pName."', Price = ".$pPrice.", Detail = '".$pDetail."' where PID = ".$id;
			  $result = mysql_query($sql) or die (mysql_error());
			  if($result){
			  	?>
			  	<script type="text/javascript">
			  		window.location = "display_edit.php";
			  	</script>
			  	<?
			  }
		}
		else{
			$upfile = $_FILES['upfile']['tmp_name'];
			$name = $_FILES['upfile']['name'];
			$size = $_FILES['upfile']['size'];
			$type = $_FILES['upfile']['type'];
			$file = fopen($upfile, "r");
			$content = fread($file, filesize($upfile));
			$content = addslashes($content);
			fclose($file);
			
			$sql = "update products set PName = '".$pName."', fileName = '".$name."', fileType = '".$type."', fileSize = '".$size."', fileContent = '".$content."', Price = ".$pPrice.", Detail = '".$pDetail."' where PID = ".$id;
			  $result = mysql_query($sql) or die (mysql_error());
			  if($result){
			  	?>
			  	<script type="text/javascript">
			  		window.location = "display_edit.php";
			  	</script>
			  	<?
			  }
		}
	}
?>