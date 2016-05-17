<?php
session_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<?php /*
mysql_connect("localhost","root","0303");
mysql_select_db("shopping");
mysql_query('set names utf8');*/
?>
<?php require_once('../conn.php'); ?>

<table width="710"  border="1" align="center">
  <tr>
  	<td bgcolor="#0099FF" width="150"><center><h3>Picture</h3></center></td>
    <td bgcolor="#0099FF" width="100"><center><h3>ProductID</h3></center></td>
    <td bgcolor="#0099FF" width="100"><center><h3>ProductName</h3></center></td>
    <td bgcolor="#0099FF" width="100"><center><h3>Price</h3></center></td>
    <td bgcolor="#0099FF" width="100"><center><h3>Amount</h3></center></td>
    <td bgcolor="#0099FF" width="100"><center><h3>Total</h3></center></td>
  </tr>
  <?php
  $Total = 0;
  $SumTotal = 0;

  for($i=0;$i<=(int)$_SESSION["intLine"];$i++)
  {
	  if($_SESSION["strProductID"][$i] != "")
	  {
		$strSQL = "SELECT * FROM products WHERE PID = '".$_SESSION["strProductID"][$i]."' ";
		$objQuery = mysql_query($strSQL)  or die(mysql_error());
		$objResult = mysql_fetch_array($objQuery);
		$Total = $_SESSION["strAmount"][$i] * $objResult["Price"];
		$SumTotal = $SumTotal + $Total;
	  ?>
      <script type="text/javascript"
	src="http://localhost/shopping/servicecal.php?x=<?php echo $_SESSION["strAmount"][$i]?>&y=<?php echo $objResult["Price"]?>">
</script>
<?php //echo $_GET['x'], $_GET['y']."ค่า"; ?>
<script type="text/javascript">
	var json = eval(result);
	document.write(json.value);
</script>
	  <tr>
        <td><img src="../showpic.php?id=<? echo $objResult["PID"]; ?>" style="width:150px"></td>
		<td bgcolor="#66FF66"><center><?php echo $_SESSION["strProductID"][$i];?></center></td>
		<td bgcolor="#66FF66"><center><?php echo $objResult["PName"];?></center></td>
		<td bgcolor="#66FF66"><center><?php echo $objResult["Price"];?></center></td>
		<td bgcolor="#66FF66"><center><?php echo $_SESSION["strAmount"][$i];?></center></td>
		<td bgcolor="#66FF66"><center><?php echo number_format($Total,2);?></center></td>
	  </tr>
	  <?php
	  }
  }
  ?>
</table>
<table align="center">
<td>Sum Total <?php echo number_format($SumTotal,2);?> บาท </td>
</table>
<br><br>
<form name="form1" method="post" action="save_checkout.php">
  <table width="504" border="1" align="center">
    <tr>
    <?  $Email = $_SESSION['Email'];
		$ch = "select * from user where email = '$Email'";
		$c = mysql_query($ch)or die(mysql_error());
		$n = mysql_fetch_assoc($c);
		
	  ?>
      <td width="71" bgcolor="#CCCC33"><center>Name</center></td>
      <td width="217"><center><input type="text" name="txtName" value="<? echo $n[name]."  ".$n[lastName]; ?>"></center></td>
    </tr>
    <tr>
      <td width="100" bgcolor="#CCCC33"><center>Address</center></td>
      <td><center><textarea name="txtAddress"><? echo $n[Address]; ?></textarea></center></td>
    </tr>
    <tr>
      <td bgcolor="#CCCC33"><center>Tel</center></td>
      <td><center><input type="text" name="txtTel" value="<? echo $n[tel]; ?>"></center></td>
    </tr>
    <tr>
      <td bgcolor="#CCCC33"><center>Email</center></td>
      <td><center><input name="txtEmail" type="text" value="<? echo $n[email]; ?>" readonly></center></td>
    </tr>
  </table>
  <table width="100"  border="0" align="center">
  <tr>
  <td><input type="submit" name="Submit" value="ส่งข้อมูลการจัดส่ง"></td>
  </tr>
  </table>
    
</form>
<?php
mysql_close();
?>
</body>
</html>
