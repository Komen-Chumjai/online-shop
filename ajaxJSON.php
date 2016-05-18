<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript">
$(document).ready(function(){

	$("#btn1").click(function(){
			$.ajax({ 
				url: "resultMySQL.php" ,
				type: "POST",
				data: 'keyword=' +$("#txtCountryCode").val()
			})
			.success(function(result) { 

					$("#div1").empty();

				var obj = jQuery.parseJSON(result);
				  $.each(obj, function(key, val) {

					   $("#div1").append('<hr />');
					   $("#div1").append('[' + key + '] ' + 'PID=' + val["PID"] +'<br />');
					   $("#div1").append('[' + key + '] ' + 'PName=' + val["PName"] +'<br />');
					   $("#div1").append('[' + key + '] ' + 'Price=' + val["Price"] +'<br />');
					   $("#div1").append('[' + key + '] ' + 'Status=' + val["Status"] +'<br />');


				  });

			});

		});
	});
</script>
</head>
<body>
Search  (Price)
<input type="text" id="txtCountryCode">
<input type="button" id="btn1" value="Search">
<div id="div1"></div>

</body>
</html>