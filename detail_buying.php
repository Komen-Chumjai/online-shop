<?
	include('conn.php');
	mysql_select_db('shopping');
	mysql_query('set names utf8');

	$email = $_POST['email'];
	// t2.OrderID, ProductID,
	$sql = "select PName, Amount, Price, t1.Address from orders t1, orders_detail t2, products t3 where Email = '".$email."' and t1.OrderID = t2.OrderID and ProductID = PID";
	$result = mysql_query($sql)or die(mysql_error());
	echo "<table class=\"table table-hover\">";
	echo "<thead>
		<th>Products</th>
		<th>amount</th>
		<th>total</th>
	</thead>";
	$total = 0;
	while($data = mysql_fetch_array($result)){
		echo "<tr>";
		echo "<td align=\"center\">".$data[0]."</td >";
		echo "<td align=\"center\">".$data[1]."</td >";
		echo "<td align=\"center\">".($data[2]*$data[1])."</td >";
		echo "</tr>";
		$total += $data[2]*$data[1];
	}
	echo "<td></td><td></td><th><u>".$total."</u></th>";
	echo "</table>";
	echo "<div class=\"well\">".@mysql_result($result, 0, 3)."</div>";
	echo "<center><a href=\"delete_buying.php?email=".$email."\"><button id=\"delete\" type=\"button\" class=\"btn btn-danger btn-sm btn3d\"><span class=\"glyphicon glyphicon-trash\"></span> Delete</button></a></center>";
?>