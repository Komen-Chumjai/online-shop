<?
	$id = $_GET['id'];

	include('conn.php');
	//mysql_select_db('shopping');
	mysql_select_db('acsm_66b66b66c4075da');

	$result = mysql_query("select PName, fileName, Price, Detail, Status from products where PID = $id");
	$data = mysql_fetch_array($result);
?>
<form method="post" action="edit_product.php" enctype="multipart/form-data" style="width:85%">
	<input type="hidden" name="id" value="<? echo $id ?>">
	<div class="form-group">
		<label for="email">Name:</label>
			<input class="form-control" name="name" value="<? echo $data[PName] ?>">
	</div>
	<div class="form-group has-success">
		<label for="email">Price:</label>
		<div class="input-group">
			<input class="form-control" name="price" value="<? echo $data[Price] ?>"><span class="input-group-addon">฿</span>
		</div>
	</div>
	<div class="form-group">
		<label style="color:black;font-weight:bold">image:<font color="red">*</font></label><br><br>
	  	<input class="form-control" type="file" id="upfile" name="upfile">
	</div>
	<div class="form-group">
	  	<label style="color:black;font-weight:bold">detail:</label><br><br>
	   	<textarea class="form-control" id="detail" name="detail"><? echo $data[Detail] ?></textarea>
	</div>
	<center><button id="success" type="submit" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-pencil"></span> OK</button></center>
</form>