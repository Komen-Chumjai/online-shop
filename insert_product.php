<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="bootstrap/3.3.5/js/jquery-1.11.3.min.js"></script>
  	<script src="bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<title></title>
</head>
<body>
<?
	/*$objConnect = mysql_connect('localhost', 'root', '0303');
	mysql_select_db("shopping");*/
	$objConnect = mysql_connect('ap-cdbr-azure-southeast-b.cloudapp.net', 'b5a3e343f57232', 'eae92a34');
	mysql_select_db("acsm_66b66b66c4075da");
	mysql_query("set names utf8");
	
	$pName = $_POST['name'];
	$pPrice = $_POST['price'];
	$pDetail = $_POST['detail'];
	//echo $_FILES['upfile']['name'];
	if($_FILES){
		if($_FILES['upfile']['error'] != 0){
			echo "File Uploaded Error!<br>";
			echo "<a href=\"javascript: history.back()\">Back</a></front>";
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
			
			$sql = "insert into products (PName, fileName, fileType, fileSize, fileContent, Price, Detail, Status) values ('$pName', '$name', '$type', '$size', '$content', '$pPrice', '$pDetail', 1)";
			  $result = mysql_query($sql) or die (mysql_error());
			  //อาเราย์ตำแหน่งที่  ให้ไปลงโฟเด้อ image
			  
			  
		$photo = $_FILES['upfile']['tmp_name'];
		$photo_name = $_FILES['upfile']['name'];
		$photo_size = $_FILES['upfile']['size'];
		$photo_type = $_FILES['upfile']['type'];	
		$set_photo = explode(".", $photo_name); // name.jpg ==> name ==> 0 , jpg ==>1
		$pfname="imag_".time();
		$plname=$set_photo[count($set_photo)-1];// name.a.b.jpg ==>  jpg
		$photoname=$pfname ."." .$plname;		
		copy($photo,"image/".$photoname);
		if(isset($_FILES['upfile']))
		{
				 $sql2 = "insert into product (ProductName, Price, Picture) values ('$pName', '$pPrice', '$photoname')";
			 $result2 = mysql_query($sql2) or die (mysql_error());
		}
		
			  if($result & $result2){
			  	?>
			  		<script type="text/javascript">
			  		$(document).ready(function(){
			  			$('#myModal').modal('show');
			  			$('#myModal').on('hidden.bs.modal', function(){
			  				window.location = "display_edit.php";
			  			});
			  		});
			  		</script>
			  		

						
			  	<?
			  }
		}
	}
?>
<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
	  <div class="modal-dialog modal-sm">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-body">
	        <h3 style="color:green" align="center">Success !!</h3>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
	    </div>

	  </div>
	</div>
</body>
</html>