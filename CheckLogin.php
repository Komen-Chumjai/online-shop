<?php session_start();?>
<?php require_once('../conn.php'); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
 $Email = $_POST['Email'];
 // echo $Email;

 $Password = md5($_POST['Password']);
 // echo $Password;
 if($Email == "") 
 {                   
echo "คุณยังไม่ได้กรอกชื่อผู้ใช้ครับ";
//echo "<meta http-equiv='refresh' content='1;url=login.php'>" ;
 } 
 else { 
                                              
	$check = "select * from user where email ='$Email' and password ='$Password'";
	$ch = mysql_query($check);                        
	$num = mysql_num_rows($ch);

	if($num == 0)
 	{
	 echo "Email หรือ Password อาจจะผิด กรุณาทำการ Login ใหม่ <br/>";
 	} 
	else 
	{
		date_default_timezone_set('Asia/Bangkok');
		$date = date('Y-m-d');
		$result = mysql_query("select countLogin from user where email = '$Email'")or die(mysql_error());
		$countLogin = mysql_result($result, 0);
 		while ($data = mysql_fetch_array($ch) )
	 	{
			if($data['type']== "Member")
	 		{
		 		echo "Welcome Member<br /></h2>";   
		                      
		 		$_SESSION['Name'] = $data['name']; 
		 		$_SESSION['Surname'] = $data['lastName'];
		 		$_SESSION['Email'] = $Email; 
				//$_SESSION['PID'] = $PID; 
		 		$_SESSION['type'] = "Member";
		 		mysql_query("update user set countLogin = ($countLogin+1)");
		 		echo "<meta http-equiv='refresh' content='1;url=../index.php'>" ;                              
	 		}  
	 
	  		else if($data['type']== "Admin")
	 		{
		 		echo "Welcome Admin<br />";   
		                      
		 		$_SESSION['Name'] = $data['name']; 
		 		$_SESSION['Surname'] = $data['lastName'];  
		 		$_SESSION['Email'] = $Email;   
		 		$_SESSION['type'] = "Admin"; 
		 		mysql_query("update user set countLogin = ($countLogin+1)");
		 		echo "<meta http-equiv='refresh' content='1;url=../'>" ;                              
	 		}                     
	 	}
 	}
}
?>
<title>ยินดีต้อนรับ</title>
