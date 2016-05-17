<?php /*
@header('Content-Type: text/html; charset=utf-8');
$con = mysql_connect('localhost','root','0303')or exit("เชื่อมต่อไม่ได้");  
mysql_select_db('shopping')or exit("Database ผิดพลาด");
mysql_query("SET NAMES UTF8");*/
?>
<?php require_once('../conn.php'); ?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="information.php">
<table width="1100" height="500" border="1">
  <tr>
    <td width="300" rowspan="5"><center>
	<?php $id = $_GET['id'];?>
	<img src="../showpic.php?id=<?php echo $id ?>" style="width:480px">
	</center></td>
    <td bgcolor="#00FFFF" width="831" colspan="2"><center><h1><b>ข้อมูลสินค้า</b></h1></center></td>
  </tr>
  <tr>
    <td bgcolor="#FFFF99" colspan="2">รหัสสินค้า : 
	
	<?php 
	 $id = $_GET['id'];
	 $CID1 = "select * from products where PID ='$id' ";
	 $chid1 = mysql_query($CID1);
	 $dataa1 = mysql_fetch_array($chid1);
	 $PID1 = $dataa1[PID];
	 $check1 = "select PID from products where PID ='$id' ";
	$ch1 = mysql_query($check1);
	$data1 = mysql_fetch_array($ch1)or exit(mysql_error()); 
	echo $data1[PID];
	?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFF99" colspan="2">ราคา : 
	<?php
	 $id = $_GET['id'];
	 $CID1 = "select * from products where PID ='$id' ";
	 $chid1 = mysql_query($CID1);
	 $dataa1 = mysql_fetch_array($chid1);
	 $PID1 = $dataa1[PID];
	 $check1 = "select Price from products where PID ='$id' ";
	$ch1 = mysql_query($check1);
	$data1 = mysql_fetch_array($ch1)or exit(mysql_error()); 
	echo $data1[Price];
	?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFF99" colspan="2">รายละเอียด : 
	<?php
	 $id = $_GET['id'];
	 $CID1 = "select * from products where PID ='$id' ";
	 $chid1 = mysql_query($CID1);
	 $dataa1 = mysql_fetch_array($chid1);
	 $PID1 = $dataa1[PID];
	 $check1 = "select Detail from products where PID ='$id' ";
	$ch1 = mysql_query($check1);
	$data1 = mysql_fetch_array($ch1)or exit(mysql_error()); 
	echo $data1[Detail];
	?></td>
  </tr>
 </table>
   <center>
   
   <a href="information.php?id=<? echo $id; ?>">หยิบลงตะกร้า</a>
        <!--<input type="submit" name="button" id="button" value="หยิบลงตะกร้า" />-->
      </center>
</form>
</body>
</html>
