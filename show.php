<?php
session_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
    
<?php /* 
mysql_connect("localhost","root","0303");
mysql_select_db("shopping");
mysql_query('set names utf8'); */
?>
<?php require_once('../conn.php'); ?>

  <form action="update.php" method="post">
<table width="810"  border="1" align="center">
  <tr>
    <td bgcolor="#0099FF" width="150"><center><h3>Picture</h3></center></td>
    <td bgcolor="#0099FF" width="120"><center><h3>ProductID</h3></center></td>
    <td bgcolor="#0099FF" width="140"><center><h3>ProductName</h3></center></td>
    <td bgcolor="#0099FF" width="100"><center><h3>Price</h3></center></td>
    <td bgcolor="#0099FF" width="100"><center><h3>Amount</h3></center></td>
    <td bgcolor="#0099FF" width="100"><center><h3>Total</h3></center></td>
    <td bgcolor="#0099FF" width="50"><center><h3>Del</h3></center></td>
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
		//echo $Total;
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
		<td bgcolor="#CC99FF"><center><?php echo $_SESSION["strProductID"][$i];?><input type="hidden" name="txtProductID<?php echo $i;?>" value="<?php echo $_SESSION["strProductID"][$i];?>"></td>
		<td bgcolor="#CC99FF"><center><?php echo $objResult["PName"];?></center></td>
		<td bgcolor="#CC99FF"><center><?php echo $objResult["Price"];?></center></td>
		<td bgcolor="#CC99FF"><center><input type="text" name="txtAmount<?php echo $i;?>" value="<?php echo $_SESSION["strAmount"][$i];?>" size="2"></center></td>
		<td bgcolor="#CC99FF"><center><?php echo number_format($Total,2);?></center></td>
		<td bgcolor="#CC99FF"><center><a href="delete.php?Line=<?php echo $i;?>">x</a></center></td>
	  </tr>
	  
	  <?php
	  }
  }     
  ?>
</table>
<table width="400"  border="0" align="center">
  <tr>
  <td><input type="submit" value="Update"></td>
  <td align="right">Sum Total <?php echo number_format($SumTotal,2);?> บาท </td>

  </tr>
  </table>
</form>
<table width="350"  border="0" align="right">
  <tr>
<td><br><br><h2><a href="product.php">Go to Product</a>
<?php
	if($SumTotal > 0)
	{
?>
	| <a href="checkout.php">Finish</a></h2></td>
    </tr>
    </table>
<?php
	}
?>
<?php
mysql_close();
?>
</body>
</html>

