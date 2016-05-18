<html>
<head>
</head>
<body>
<?php
$$con = mysql_connect('ap-cdbr-azure-southeast-b.cloudapp.net','b5a3e343f57232','eae92a34');  //ดาต้าเบลด azure
mysql_select_db('acsm_66b66b66c4075da');
mysql_query("SET NAMES UTF8");

/*if($con)
{
	echo "Connect success";
}
else
{
	echo "MySQL Connect Failed : Error : ".mysql_error();
}*/


$strSQL = "SELECT * FROM customer";
$objQuery = mysql_query($strSQL) or die (mysql_error());

?>
<table width="600" border="1">
  <tr>
    <th width="91"> <div align="center">CustomerID </div></th>
    <th width="98"> <div align="center">Name </div></th>
    <th width="198"> <div align="center">Email </div></th>
    <th width="97"> <div align="center">CountryCode </div></th>
    <th width="59"> <div align="center">Budget </div></th>
    <th width="71"> <div align="center">Used </div></th>
  </tr>
<?php
while($objResult = mysql_fetch_array($objQuery))
{
?>
  <tr>
    <td><div align="center"><?php echo $objResult["CustomerID"];?></div></td>
    <td><?php echo $objResult["Name"];?></td>
    <td><?php echo $objResult["Email"];?></td>
    <td><div align="center"><?php echo $objResult["CountryCode"];?></div></td>
    <td align="right"><?php echo $objResult["Budget"];?></td>
    <td align="right"><?php echo $objResult["Used"];?></td>
  </tr>
<?php
}
?>
</table>
<?php
mysql_close($con);
?>
</body>
</html>