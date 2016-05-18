<?php
	$objConnect = mysql_connect("ap-cdbr-azure-southeast-b.cloudapp.net","b5a3e343f57232","eae92a34") or die(mysql_error());
	$objDB = mysql_select_db("acsm_66b66b66c4075da");  
	mysql_query("SET NAMES UTF8");
	$strSQL = "SELECT * FROM products WHERE 1 AND Price = '".$_POST["keyword"]."' ";
	$objQuery = mysql_query($strSQL) or die (mysql_error());
	$intNumField = mysql_num_fields($objQuery);
	$resultArray = array();
	while($obResult = mysql_fetch_array($objQuery))
	{
		$arrCol = array();
		for($i=0;$i<$intNumField;$i++)
		{
			$arrCol[mysql_field_name($objQuery,$i)] = $obResult[$i];
		}
		array_push($resultArray,$arrCol);
	}
	
	mysql_close($objConnect);
	
	echo json_encode($resultArray);
?>