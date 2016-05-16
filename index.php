<?php session_start();?>
<?php
if (!isset($_SESSION)) {
  @session_start();
  if(!isset($_SESSION['Name'])) {
	  @header("Location: index.php");
    exit;
  }
}


// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
  session_destroy();
  $logoutGoTo = "index.php";
  if ($logoutGoTo) {
    @header("Location: $logoutGoTo");
    exit;
  }
}
?>
<!DOCTYPE html>
<html>
<head>

  <title>Shopping Online</title>
  <link rel="shortcut icon" href="image/shop1.ico" type="favicon/ico" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link href='https://fonts.googleapis.com/css?family=Lora:700italic' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="bootstrap/3.3.5/js/jquery-1.11.3.min.js"></script>
  <script src="bootstrap/3.3.5/js/bootstrap.min.js"></script>

  <style>
  @media (min-width: 1024px){

  }
  body {
      position: relative; 
  }
  h1, .signup{
  	font-family: 'Lora', serif;
    font-size: 4em;
  }
  td{
  	color: black;
  }
  #tab{
    border-radius: 10px;
  }
  .pic{
  	height: 230px;
  }
  #header {padding-top:200px;height:500px;color: #fff; background-color: #1E88E5;}
  #newitem {padding-top:50px;height:600px;color: #fff; background-color: pink;}
  #catalogs {padding-top:50px;color: #fff;}
  #shipping {padding-top:50px;color: #fff; background-color: pink; padding-bottom: 50px}
  #transport {padding-top:50px;color: #fff; background-color: #009688; padding-bottom: 50px}
  </style>
  <script type="text/javascript">
  $(document).ready(function(){
		$("#flip").click(function()
		{
			$("#panel").slideToggle("slow");
		});
  	$("td#tab").on({
  		mouseenter: function(){
  			$(this).css("background-color", "lightblue");
  		},
  		mouseleave: function(){
  			$(this).css("background-color", "white");
  		}
  	});
  });
  </script>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#header"><span><img src="image/shop1.ico" width="25"></span> Shopping Online</a>
    </div>
    <div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li><a href="#newitem"><span><img src="image/newitem.ico" width="25">New item</a></li>
          <li><a href="#catalogs"><span><img src="image/catalogs.ico" width="25">Catalogs</a></li>
          <li><a href="#shipping"><span><img src="image/busket.ico" width="25">Shipping</a></li>
          <li><a href="#transport"><span><img src="image/post.png" width="25">Transport</a></li>
          <?
		  	if($_SESSION['type'] == 'Admin'){
		  ?>
          <li><a href="display_edit.php"><span class="glyphicon glyphicon-user"></span> management</a></li>
          <li><a href="display_buying.php"><span class="glyphicon glyphicon-user"></span> Orders</a></li>
          <li><a href="<?php echo $logoutAction ?>"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
          <? } 
		  if($_SESSION['type'] == 'Member'){
		  ?>
          <li>Welcome Member <? echo $_SESSION['Name']." ".$_SESSION['Surname'] ?></li>
          <li><a href="<?php echo $logoutAction ?>"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
          <? } ?>
        </ul>
      </div>
    </div>
  </div>
</nav>
<div style="margin-top:54px">
	<?  include('Guy/login.php') ?>
</div>
<div id="header" class="container-fluid">
  <h1 align="center">Shopping Online</h1>

</div>
<div id="newitem" class="container-fluid">
  <h1 align="center"> <span><img src="image/newitem.ico" width="50"> New item!</h1>
  <div class="container">
  <br>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <!-- <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol> -->

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active" align="center">
        <img src="image/new1.jpg"  width="30%">
      </div>
      <div class="item" align="center">
        <img src="image/new2.jpg"  width="30%">
      </div>
      <div class="item" align="center">
        <img src="image/new3.jpg"  width="30%">
      </div>
      <div class="item" align="center">
        <img src="image/new4.jpg"  width="30%">
      </div>
      <div class="item" align="center">
        <img src="image/new5.jpg"  width="30%">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <!-- <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> -->
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <!-- <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> -->
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
</div>
<div id="catalogs" class="container-fluid">
  <h1 align="center" style="color:black">Catarlogs</h1>
  

  <? require('product.php') ?>
  <? //require('myclient.php') ?>

  <!-- james -->
  
</div>
<div id="shipping" class="container-fluid">
  <h1 align="center">Shipping</h1>
  <br>
  <? require('james/buyandpay2.php') ?>
</div>



<div id="transport" class="container-fluid">
  <? require('transport.php') ?>
</div>
<script>
$(document).ready(function(){
    $('body').scrollspy({target: ".navbar", offset: 50});   
});
</script>

</body>
</html>
