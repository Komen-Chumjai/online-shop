<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="image/shop1.ico" type="favicon/ico" />
 	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  	<link href='https://fonts.googleapis.com/css?family=Lora:700italic' rel='stylesheet' type='text/css'>
  	<link rel="stylesheet" href="bootstrap/3.3.5/css/bootstrap.min.css">
  	<script src="bootstrap/3.3.5/js/jquery-1.11.3.min.js"></script>
  	<script src="bootstrap/3.3.5/js/bootstrap.min.js"></script>
  	<link rel="stylesheet" href="shop_lib.css">

  	<style type="text/css">
    *{
      margin: 0;
      padding: 0;
    }
  	th{
  		text-align: center;
  	}
    
    @media screen and (max-width: 1024px) {
      .panel-success{
        width: 70%;
      }
      .col-md-9{
        width:67%;
      }
    }
  	</style>
    <!-- *********************** Modal ****************************** -->
    <script type="text/javascript">
    $(document).ready(function(){
	  $('#homepage').mouseup(function(){
           window.location = "./";
      });
	});
    function detail(email){
      $('.col-md-3').css('display','block');
      $.post('detail_buying.php',
      {
        email: email
      },
        function(data, status){
          $('#detail').empty();
          $('#detail').append(data);
      });
    }
    </script>


	<title>Shopping Online</title>
</head>
<body>
<div class="container" style="width:100%">
  <div class="page-header">
    <div class="row">
  	 <div class="col-md-7">
  		<h1 class="logo">Shopping Online <small>(Admin)</small></h1>
  	 </div>
  	 <div class="col-md-5" align="right">
  	 	<button id="homepage" type="button" style="margin-top:60px" class="btn3d btn btn-primary btn-lg"><span class="glyphicon glyphicon-home"></span> Home page</button>
  	 </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-9">
	   <div class="panel panel-primary">
  		<div class="panel-heading">
    		<h3 class="panel-title" align="center">Orders list</h3>
  		</div>
		  <div class="panel-body">
			 <div class="table-responsive">
  				<table class="table">
  					<thead>
  						<th>Name</th>
              <th>Count-login</th>
  						<th>last-login</th>
  						<th>tel.</th>
  						<th></th>
  					</thead>
            <? require('show_buying.php') ?>
  				</table>
			 </div>
		  </div>
	   </div>
    </div>
    <div class="col-md-3" style="border-left:1px solid #ccc;display:none">
      <form style="margin-left:0px;height" method="post" action="">
  	     <div class="panel panel-success">
    		  <div class="panel-heading">
      		  <h1 id="hDetail" align="center"><font face="angsana new">Orders</font></h1>
    		  </div>
		      <div id="detail" class="panel-body">
            
  			    
  	      </div>
  	     </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal -->
  <div class="modal fade" id="edit" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal_title">Modal Header</h4>
        </div>
        <div class="modal_body" style="padding:0px">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</body>
</html>