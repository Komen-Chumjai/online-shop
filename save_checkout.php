<?php
session_start();
?>
<?php
/*mysql_connect("localhost","root","0303");
mysql_select_db("shopping");*/
?>
<?php require_once('../conn.php'); ?>

<?php

  //echo "----".$n = $_POST[txtName];

  $Total = 0;
  $SumTotal = 0;

  $strSQL = "
	INSERT INTO orders (OrderDate,Name,Address,Tel,Email)
	VALUES
	('".date("Y-m-d H:i:s")."','".$_POST["txtName"]."','".$_POST["txtAddress"]."' ,'".$_POST["txtTel"]."','".$_POST["txtEmail"]."') 
  ";
  mysql_query($strSQL) or die(mysql_error());

  $strOrderID = mysql_insert_id();
  
  

  for($i=0;$i<=(int)$_SESSION["intLine"];$i++)
  {
	  if($_SESSION["strProductID"][$i] != "")
	  {
			  $strSQL = "
				INSERT INTO orders_detail (OrderID,ProductID,Amount)
				VALUES
				('".$strOrderID."','".$_SESSION["strProductID"][$i]."','".$_SESSION["strAmount"][$i]."') 
			  ";
			  mysql_query($strSQL) or die(mysql_error());
	  }
  }

mysql_close();

session_destroy();

header("location:finish_order.php?OrderID=".$strOrderID);
?>
