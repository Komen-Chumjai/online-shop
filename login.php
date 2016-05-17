<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script>
$(document).ready(function()
{
	$(document).ready(function()
	{
		/*$("#flip").click(function()
		{
			$("#panel").slideToggle("slow");
		});*/
	});
});
</script>

<style> 
#panel{
    padding: 5px;
    text-align: center;
    background-color: #e5eecc;
    border: solid 1px #c3c3c3;
}
#flip {
    padding: 5px;
    text-align: center;
    background-color: #00ffff;
    border: solid 1px #c3c3c3;
}


#panel {
    padding: 50px;
    display: none;
}
</style>
<script type="text/javascript">
var chk = true;
$(document).ready(function(){
  setInterval(function(){
    if(chk){
      $('#flip').css("background-color", "#00FF00");
      chk = false;
    }
    else{
      $('#flip').css("background-color", "#00ffff");
      chk = true;
    }
  }, 200);
});
</script>
</head>
<body>
<div id="flip">Click to slide เข้าสู่ระบบและลงทะเบียน</div>
<div id="panel">
<table width="100%" border="1">
  <tr>
    <td width="30%">
    
    <table width="30%"align="center" >
      <tr valign="baseline">
      <td width="15%" align="right" nowrap="nowrap">&nbsp;</td>
      <td width="15%" align="center" valign="bottom">
      
      </td>
    </tr>
    
<?php include('singup.php'); ?>
    
    <td width="70%" align="center">
    
	<form action="Guy/Checklogin" method="POST" enctype="multipart/form-data" name="form"id="form">
        <div class="form-group">
          <label for="Email">Email:</label>
          <input name="Email" type="Email" class="form-control" id="Email" placeholder="Enter Email" size="20">
        </div>
        <div class="form-group">
          <label for="Password">Password:</label>
          <input name="Password" type="Password" class="form-control" id="Password"  placeholder="Enter Password" size="20">
        </div>
        <div class="checkbox"><label><input type="checkbox"> Remember me</label></div>
         <button type="submit" class="btn btn-default">Login</button>
  	</form>

</td>
  </tr>
</table>
</div>

</body>
</html>
