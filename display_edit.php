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
            $('img#modal-pic').click(function(){
              $('.modal-body').empty();
              $('.modal-body').append('<img src=\"'+$(this).attr('src')+'\" style=\"width:400px\">');
            });

            $('.btn-info').click(function(){
              $('.modal_title').empty();
              $('.modal_title').append('Product ID #'+$(this).attr('id'))

              $('.modal_body').empty();
              $('.modal_body').load('form_edit.php?id='+$(this).attr('id'));
            });

          //*********************** checkbox ******************************

            $('input:checkbox').click(function(){
              if($(this).is(':checked')){
                $.get('edit_checkbox.php?value=1&id='+$(this).val(),
                  function(data, status){
                  // alert(data);
                });
              }
              else{
                $.get('edit_checkbox.php?value=0&id='+$(this).val(),
                  function(data, status){
                  // alert(data);
                });
              }
            });

          //***************************************************************
          $('#homepage').mouseup(function(){
            window.location = "./";
          });


          // $('#success').mouseup(function(){
          //   $.post('insert_product.php',
          //   {
          //     name: $('#name').val(),
          //     price: $('#price').val(),
          //     upfile: $(':file').val(),
          //     detail: $('#detail').val()
          //   },
          //     function(data, status){
          //       alert(data);
          //     });
          // });

      });
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
    		<h3 class="panel-title" align="center">Products list</h3>
  		</div>
		  <div class="panel-body">
			 <div class="table-responsive">
  				<table class="table">
  					<thead>
  						<th>id</th>
  						<th>image</th>
  						<th>name</th>
  						<th>price (฿)</th>
  						<th>detail</th>
  						<th>Catalogs</th>
  						<th></th>
  					</thead>
            <? require('show_product.php') ?>
  				</table>
			 </div>
		  </div>
	   </div>
    </div>
    <div class="col-md-3" style="border-left:1px solid #ccc">
      <form style="margin-left:0px;height" method="post" action="insert_product.php" enctype="multipart/form-data">
  	     <div class="panel panel-success">
    		  <div class="panel-heading">
      		  <h1 align="center"><font face="angsana new">New Item</font></h1>
    		  </div>
		      <div class="panel-body">
            <div class="form-group">
    			   <label style="color:black;font-weight:bold">name:</label><br><br>
    			   <input class="form-control" id="name" name="name">
            </div>
    			  <div class="form-group has-success">
    				  <label style="color:black;font-weight:bold">price:</label><br><br>
    				  <div class="input-group">
    					 <input class="form-control" id="price" name="price"><span class="input-group-addon">฿</span>
    				  </div>
    			  </div>
    			  <div class="form-group has-default">
    				  <label style="color:black;font-weight:bold">image:<font color="red">*</font></label><br><br>
    				  <input class="form-control" type="file" id="upfile" name="upfile">
    			  </div>
    			  <div class="form-group">
    			   <label style="color:black;font-weight:bold">detail:</label><br><br>
    			   <textarea class="form-control" id="detail" name="detail"></textarea>
    			  </div>
  			    <center><button id="success" type="submit" class="btn btn-success btn-sm btn3d"><span class="glyphicon glyphicon-ok"></span> Success</button></center>
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