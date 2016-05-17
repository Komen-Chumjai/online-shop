<?php require_once('../conn.php'); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
$Email = $_POST['Email'];
//echo $Email; echo  " ";
$Password = $_POST['txtPassword'];
//echo $Password;echo  " ";
$Name = $_POST['Name'];
//echo $Name;echo  " ";
$Surname = $_POST['Surname'];
$Address = $_POST['Address'];
//echo $Surname ;echo  " ";
$Tel = $_POST['Tel'];
//echo $Tel;echo  " ";
$Sex = $_POST['Sex'];
//echo $Sex;echo  " ";

//serviceupload

	 $fileImage = $_FILES['fileToUpload']['name'];

	 //$target = "C:\AppServ\www\shopping\image";
	 $target = "/site/wwwroot/image";
	 
	
	 //$target = "C:/New folder/image/";
	 // $target = $target . basename($fileImage) ;

	 echo "file name : ".$fileImage;
	 echo "<br>";
	 echo "temp: ".$_FILES['fileToUpload']['tmp_name'];
	 echo "<br>";
	 echo "target: ".$target;

	 if (!file_exists($target)) {
	    mkdir($target, 0777, true);

	    if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target."/".$fileImage)) {
		 	echo "<br>The file ". basename( $_FILES['fileToUpload']['name']). "   Finish uploaded";
		 } 
		 else {
		 	echo "ไม่สามารถอัพโหลดไฟล์ได้เนื่องจากเกิดปัญหาบางอย่าง";
		 }
	}
	else{
		if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target."/".$fileImage)) {
		 	echo "<br>The file ". basename( $_FILES['fileToUpload']['name']). "   Finish uploaded";
		 } 
		 else {
		 	echo "ไม่สามารถอัพโหลดไฟล์ได้เนื่องจากเกิดปัญหาบางอย่าง";
		 }
	}

//จบservice

		$sql_check_email = "select Email from user where Email = '$Email'";
		$result = mysql_query($sql_check_email);
		$numrow = mysql_num_rows($result);
		if($numrow != 0)
			{
			echo "<tr><td align = center bgcolor = #EAECEA><br>อีเมลล์<b><font color = red>$Email</font></b>นี้มีอยู่ในระบบแล้ว";
			}
	
	
		else
		{
		date_default_timezone_set('Asia/Bangkok');
		$date = date('Y-m-d');
		$pass = md5($Password);
		
		$sql_insert = "insert into user set
				email   = '$Email',
				password = '$pass',
				name = '$Name',
				lastname = '$Surname',
				Address = '$Address',
				tel = '$Tel',
				sex = '$Sex',
				type = 'Member',
				countLogin = 0,
				loginDate = '$date'
				";
				$result = mysql_query($sql_insert) or exit(mysql_error());
				
		if (!$result) {echo "ERROR : ไม่สามารถเพิ่มข้อมูลได้";} else
		 {
		echo "ท่านได้ทำการสมัครสมาชิกเรียบร้อยแล้ว";
		echo "<meta http-equiv='refresh' content='2;url=../index.php'>" ;	
 		exit();
		 }
}

?>