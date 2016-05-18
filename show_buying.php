<?
  include('conn.php');
  //mysql_select_db('shopping');
  mysql_select_db('acsm_66b66b66c4075da');
  mysql_query("set names utf8");

  //$sql = "select t2.ProductID, t1.Email, PName, Price from orders t1, orders_detail t2, Products t3 where t1.OrderID = t2.OrderID and t2.ProductID = PID order by 1";
  
  $sql = "select t1.email, t1.name, lastName, countLogin, loginDate, t1.tel from user t1, orders t2 where t1.email = t2.Email group by t1.email order by t2.OrderID desc";
  $result = mysql_query($sql) or die(mysql_error());

  $i == 0;
  while($data = mysql_fetch_array($result)){



    if($i%2==0){
      echo "<tr>";
      echo "<td align=\"center\" class=\"danger\" style=\"padding-top:20px\">".$data[1]." ".$data[2]."</td>";
      echo "<td align=\"center\" class=\"danger\" style=\"padding-top:20px\">".$data[3]."</td>";
      echo "<td align=\"center\" class=\"danger\" style=\"padding-top:20px\">".$data[4]."</td>";
      echo "<td align=\"center\" class=\"danger\" style=\"padding-top:20px\">".$data[5]."</td>";
      echo "<td align=\"center\" class=\"danger\" style=\"padding-top:15px\"><button class=\"btn3d btn btn-info btn-xs\" onclick=\"detail('".$data[0]."')\"><span class=\"glyphicon glyphicon-edit\"></span></button></td>";
      echo "</tr>";
    }
    else{
      echo "<tr>";
      echo "<td align=\"center\" class=\"warning\" style=\"padding-top:20px\">".$data[1]." ".$data[2]."</td>";
      echo "<td align=\"center\" class=\"warning\" style=\"padding-top:20px\">".$data[3]."</td>";
      echo "<td align=\"center\" class=\"warning\" style=\"padding-top:20px\">".$data[4]."</td>";
      echo "<td align=\"center\" class=\"warning\" style=\"padding-top:20px\">".$data[5]."</td>";
      echo "<td align=\"center\" class=\"warning\" style=\"padding-top:15px\"><button class=\"btn3d btn btn-info btn-xs\" onclick=\"detail('".$data[0]."')\"><span class=\"glyphicon glyphicon-edit\"></span></button></td>";
      echo "</tr>";
    }
    $i++;
  }
?>