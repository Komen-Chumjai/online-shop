<?php
//session_start();
//session_destroy();
?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<?php require_once('../conn.php'); ?>

<?php /*
mysql_connect("localhost","root","0303");
mysql_select_db("shopping");
mysql_query('set names utf8');*/
$strSQL = "SELECT * FROM products";
$objQuery = mysql_query($strSQL)  or die(mysql_error());
?>
<table width="700"  border="1" align="center">
  <tr>
    <td bgcolor="#0099FF" width="100"><center><h3>Picture</h3></center></td>
    <td bgcolor="#0099FF" width="130"><center><h3>ProductID</h3></center></td>
    <td bgcolor="#0099FF" width="130"><center><h3>ProductName</h3></center></td>
    <td bgcolor="#0099FF" width="100"><center><h3>Price</h3></center></td>
    <td bgcolor="#0099FF" width="200"><center><h3>Buy</h3></center></td>
  </tr>
  <?php
  while($objResult = mysql_fetch_array($objQuery))
  {
  ?>
  <tr>
  <form action="order.php" method="post">
   <!--<td><img src="../showpic.php?id=<?php// echo $id ?>" style="width:480px"> </td>-->
	<td><img src="../showpic.php?id=<? echo $objResult["PID"]; ?>" style="width:150px"></td>
    <td bgcolor="#FFFF99"><center><?php echo $objResult["PID"];?></center></td>
    <td bgcolor="#FFFF99"><center><?php echo $objResult["PName"];?></center></td>
    <td bgcolor="#FFFF99"><center><?php echo $objResult["Price"];?></center></td>
 <td bgcolor="#FFFF99"><center><input type="hidden" name="txtProductID" value="<?php echo $objResult["PID"];?>" size="2">      <!--<input type="text" name="txtQty" value="1" size="2">--> <input type="submit" value="Buy"></center></td>
	</form>
  </tr>
  <?php
  }
  ?>
</table>
<table width="300"  border="0" align="left">
  <tr>
<td>
<h2><a href="show.php">View Bucket</a>  <a href="clear.php">Clear Bucket</a></h2></td></tr></table>
<?php
mysql_close();
?>
</body>
</html>

