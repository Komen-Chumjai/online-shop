<?
	include('conn.php');
	//mysql_select_db('shopping');
	mysql_select_db('acsm_66b66b66c4075da');

	$sql = 'select * from products order by PID DESC';
	$result = mysql_query($sql);

	$i = 0;
	while($data = mysql_fetch_array($result)){
		if($i%2==0){
			echo "<tr>";
			echo "<td align=\"center\" class=\"danger\" style=\"padding-top:20px\">#".$data[PID]."</td>";
			echo "<td align=\"center\" class=\"danger\"><a href=\"#\">
				<img id=\"modal-pic\" src=\"showpic.php?id=".$data[PID]."\" style=\"width:50px;height:50px\" data-toggle=\"modal\" data-target=\"#myModal\"></td>";
			echo "<td align=\"center\" class=\"danger\" style=\"padding-top:20px\">".$data[PName]."</td>";
			echo "<td align=\"center\" class=\"danger\" style=\"padding-top:20px\">".$data[Price]."</td>";
			echo "<td align=\"center\" class=\"danger\" style=\"padding-top:20px\">".mb_substr($data[Detail], 0, 20, 'utf8')." ...</td>";
			if($data[Status] == 1){
				echo "<td align=\"center\" class=\"danger\">

				<div class=\"form-group badge-checkboxes\">
		    	    <div class=\"checkbox\">
		   	        	<label>
		                	<input type=\"checkbox\" value=\"".$data[PID]."\" checked>
		                	<span class=\"badge\">show</span>
		            	</label>
		        	</div>
		    	</div>
				</td>";
			}
			else{
				echo "<td align=\"center\" class=\"danger\">

				<div class=\"form-group badge-checkboxes\">
		    	    <div class=\"checkbox\">
		   	        	<label>
		                	<input type=\"checkbox\" value=\"".$data[PID]."\">
		                	<span class=\"badge\">show</span>
		            	</label>
		        	</div>
		    	</div>
				</td>";
			}
			echo "<td align=\"center\" class=\"danger\" style=\"padding-right:0px;padding-left:0px;padding-top:20px\">
				<button type=\"button\"  id=\"".$data[PID]."\" class=\"btn btn-info btn-xs\" data-toggle=\"modal\" data-target=\"#edit\"><span class=\"glyphicon glyphicon-pencil\"></span></button>
				<a href=\"delete_product.php?id=".$data['PID']."\"><button type=\"button\" class=\"btn btn-danger btn-xs\"><span class=\"glyphicon glyphicon-trash\"></span></button></a></td>";
			echo "</tr>";
		}
		else{
			echo "<tr>";
			echo "<td align=\"center\" class=\"warning\" style=\"padding-top:20px\">#".$data[PID]."</td>";
			echo "<td align=\"center\" class=\"warning\"><a href=\"#\">
				<img id=\"modal-pic\" src=\"showpic.php?id=".$data[PID]."\" style=\"width:50px;height:50px\" data-toggle=\"modal\" data-target=\"#myModal\"></td>";
			echo "<td align=\"center\" class=\"warning\" style=\"padding-top:20px\">".$data[PName]."</td>";
			echo "<td align=\"center\" class=\"warning\" style=\"padding-top:20px\">".$data[Price]."</td>";
			echo "<td align=\"center\" class=\"warning\" style=\"padding-top:20px\">".mb_substr($data[Detail], 0, 20, 'utf8')." ...</td>";
			if($data[Status] == 1){
				echo "<td align=\"center\" class=\"warning\">

				<div class=\"form-group badge-checkboxes\">
		    	    <div class=\"checkbox\">
		   	        	<label>
		                	<input type=\"checkbox\" value=\"".$data[PID]."\" checked>
		                	<span class=\"badge\">show</span>
		            	</label>
		        	</div>
		    	</div>
				</td>";
			}
			else{
				echo "<td align=\"center\" class=\"warning\">

				<div class=\"form-group badge-checkboxes\">
		    	    <div class=\"checkbox\">
		   	        	<label>
		                	<input type=\"checkbox\" value=\"".$data[PID]."\">
		                	<span class=\"badge\">show</span>
		            	</label>
		        	</div>
		    	</div>
				</td>";
			}
			echo "<td align=\"center\" class=\"warning\" style=\"padding-right:0px;padding-left:0px;padding-top:20px\">
				<button type=\"button\" id=\"".$data[PID]."\" class=\"btn btn-info btn-xs\" data-toggle=\"modal\" data-target=\"#edit\"><span class=\"glyphicon glyphicon-pencil\"></span></button>
				<a href=\"delete_product.php?id=".$data['PID']."\"><button type=\"button\" class=\"btn btn-danger btn-xs\"><span class=\"glyphicon glyphicon-trash\"></span></button></a></td>";
			echo "</tr>";
		}
		$i++;
	}
?>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Model</h4>
      </div>
      <div class="modal-body" align="center">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>