<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<?php require_once('../conn.php'); ?>

<?php /*
mysql_connect("localhost","root","0303");
mysql_select_db("shopping");
mysql_query('set names utf8'); */
$strSQL = "SELECT * FROM orders WHERE OrderID = '".$_GET["OrderID"]."' ";
$objQuery = mysql_query($strSQL)  or die(mysql_error());
$objResult = mysql_fetch_array($objQuery);
?>

 <table width="504" border="1" align="center">
    <tr>
      <td width="71" bgcolor="#00FF66"><center>OrderID</center></td>
      <td width="217" bgcolor="#FF99CC"><center>
	  <?php echo $objResult["OrderID"];?></center></td>
    </tr> 
    <tr>
      <td width="71" bgcolor="#00FF66"><center>Name</center></td>
      <td width="217" bgcolor="#FFCC99"><center>
	  <?php echo $objResult["Name"];?></center></td>
    </tr>
    <tr>
      <td bgcolor="#00FF66"><center>Address</center></td>
      <td bgcolor="#FFCC99"><center><?php echo $objResult["Address"];?></center></td>
    </tr>
    <tr>
      <td bgcolor="#00FF66"><center>Tel</center></td>
      <td bgcolor="#FFCC99"><center><?php echo $objResult["Tel"];?></center></td>
    </tr>
    <tr>
      <td bgcolor="#00FF66"><center>Email</center></td>
      <td bgcolor="#FFCC99"><center><?php echo $objResult["Email"];?></center></td>
    </tr>
  </table>

  <br>

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

$strSQL2 = "SELECT * FROM orders_detail WHERE OrderID = '".$_GET["OrderID"]."' ";
$objQuery2 = mysql_query($strSQL2)  or die(mysql_error());

while($objResult2 = mysql_fetch_array($objQuery2))
{
		$strSQL3 = "SELECT * FROM products WHERE PID = '".$objResult2["ProductID"]."' ";
		$objQuery3 = mysql_query($strSQL3)  or die(mysql_error());
		$objResult3 = mysql_fetch_array($objQuery3);
		$Total = $objResult2["Amount"] * $objResult3["Price"];
		$SumTotal = $SumTotal + $Total;
	  ?>
      
      <script type="text/javascript"
	src="http://localhost/shopping/servicecal.php?x=<?php echo $objResult2["Amount"]; ?>&y=<?php echo $objResult3["Price"]; ?>">
</script>
<?php //echo $objResult2["Amount"]."จำนวน";
		//echo $objResult3["Price"]."ราคา";
 ?>
<?php //echo $_GET['x'], $_GET['y']."ค่า" 
//echo $_GET["$x"]."ค่า x";
//echo $_GET["$y"]."ค่า y";
?>
<script type="text/javascript">
	var json = eval(result);
	document.write(json.value);
</script>

	  <tr>
        <td><img src="../showpic.php?id=<? echo $objResult3["PID"] ?>" style="width:150px"></td>
		<td bgcolor="#999999"><center><?php echo $objResult3["PID"];?></center></td>
		<td bgcolor="#999999"><center><?php echo $objResult3["PName"];?></center></td>
		<td bgcolor="#999999"><center><?php echo $objResult3["Price"];?></center></td>
		<td bgcolor="#999999"><center><?php echo $objResult2["Amount"];?></center></td>
		<td bgcolor="#999999"><center><?php echo number_format($Total,2);?></center></td>
	  </tr>
	  <?php
 }
  ?>
</table>
<table align="center">
<td>Sum Total <?php echo number_format($SumTotal,2);?> บาท </td>
<?php //echo $objResult2["Amount"]."จำนวน";
		//echo $objResult3["Price"]."ราคา";
 ?>
</table>
<table align="center">
<td><br><br><h2><a href="../index.php">Home</a></h2></td>
</table>
<?php
mysql_close();
?>
</body>
</html>
