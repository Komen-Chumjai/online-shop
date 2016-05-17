<?php /*
$con = mysql_connect('localhost','root','0303')or exit("เชื่อมต่อไม่ได้");  //ดาต้าเบลด localhost
mysql_select_db('shopping')or exit("Database ผิดพลาด");
mysql_query("SET NAMES UTF8");*/
?>
<?php
$con = mysql_connect('ap-cdbr-azure-southeast-b.cloudapp.net','b5a3e343f57232','eae92a34');  //ดาต้าเบลด azure
mysql_select_db('acsm_66b66b66c4075da');
mysql_query("SET NAMES UTF8");

if($con)
{
	echo "Connect success";
}
else
{
	echo "MySQL Connect Failed : Error : ".mysql_error();
}

mysql_close($con);
?>
<?php /*
@header('Content-Type: text/html; charset=utf-8');
@mysql_connect("localhost","pomjang148","Fw=yMB9X4UdV") or die("การเชื่อมต่อ connect ผิดพลาด"); // เปลี่ยนตรง ssompong16 เป็น password ของเครื่องเรา
@mysql_select_db("pomjang148_shop") or die("ไม่พบฐานข้อมูล");	//เชื่อมต่อ database ชื่อว่า projectandroid
@mysql_query("SET NAMES UTF8");*/
?>