<?php
ob_start();
session_start();
	
if(!isset($_SESSION["intLine"]))
{
	if(isset($_POST["txtProductID"]))
	{
		 $_SESSION["intLine"] = 0;
		 $_SESSION["strProductID"][0] = $_POST["txtProductID"];
		 $_SESSION["strAmount"][0] = $_POST["txtAmount"];

		 header("location:show.php");
	}
}
else
{
	
	
	$key = array_search($_POST["txtProductID"], $_SESSION["strProductID"]);
	if((string)$key != "")
	{
		 $_SESSION["strAmount"][$key] = $_SESSION["strAmount"][$key] + $_POST["txtAmount"];
	}
	else
	{
		
		 $_SESSION["intLine"] = $_SESSION["intLine"] + 1;
		 $intNewLine = $_SESSION["intLine"];
		 $_SESSION["strProductID"][$intNewLine] = $_POST["txtProductID"];
		 $_SESSION["strAmount"][$intNewLine] = $_POST["txtAmount"];
	}
	
	 header("location:show.php");

}
?>

