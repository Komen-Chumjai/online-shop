<?php
/*
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
      <table align="center" width="70%" height="150" border="1">
      <tr>
          <td align="center" height="44" colspan="5" bordercolor="#FFCC66" bgcolor="#FFCC66"><h3><center><b>
              สินค้าที่เลือก
              </b></center></h3></td>
        
        </tr>
         <tr>
        <td bordercolor="#000066" bgcolor="#0099FF"><center><b>รหัสสินค้า</b></center></td>
         <td bordercolor="#000066" bgcolor="#0099FF"><center><b>รูปสินค้า</b></center></td>
        <td bordercolor="#000066" bgcolor="#0099FF"><center><b>ชื่อสินค้า</b></center></td>
        <td bordercolor="#000066" bgcolor="#0099FF"><center><b>ราคาต่อชิ้น</b></center></td>
        <td bordercolor="#000066" bgcolor="#0099FF"><center><b>รายละเอียดสินค้า</b></center></td>
        <!--<td bordercolor="#000066" bgcolor="#0099FF"><center><b>รวม</b></center></td>-->
    
        </tr>
        <?php 
		 $id = $_GET['id'];
		//where PID = '".$_SESSION['PID']."'"
		//where PID = '".$_SESSION['PID']."'
		 $summary = "select PID, PName, Price, Detail from products where PID = '$id' ";
	  $result = mysql_query($summary)or die(mysql_error());
	  //$sum = 0;
	   //$array = array();
	 
	  while($data=mysql_fetch_array($result)){
		  echo "<tr>";
		  for($i=0;$i<5;$i++){
			  if($i==1) echo "<td><img src=\"../showpic.php?id=".$data[PID]."\" style=\"width:100px\"></td>";
			  else echo "<td>"."<center>".$data[$i]."</center>"."</td>";	 
		//		  $array[$i] += $data[$i];
		//	  }
		  }
		  echo "</tr>";
		   //$array[1] = "";
	  }
	 ?>
		<tr height=100%></tr>
      </table>
     <!-- <center>
        <input type="submit" name="button" id="button" value="ยืนยัน" />
      </center> -->
    </form>
</body>
</html>