
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="SpryAssets/SpryValidationPassword.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationConfirm.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationPassword.css" rel="stylesheet" type="text/css">
<link href="SpryAssets/SpryValidationConfirm.css" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> 
<script language="javascript">
function fncSubmit()
{
	
	if(document.form.Email.value == "")
	{
		alert('กรุณาใส่ Email ของท่าน');
		document.form.Email.focus();		
		return false;
	}	
	
	if(document.form.txtPassword.value == "")
	{
		alert('กรุณาใส่รหัสผ่าน');
		document.form.txtPassword.focus();		
		return false;
	}	

	if(document.form.txtConPassword.value == "")
	{
		alert('ใส่รหัสผ่านอีกครั้ง');
		document.form.txtConPassword.focus();		
		return false;
	}	

	if(document.form.txtPassword.value != document.form.txtConPassword.value)
	{
		alert('รหัสผ่านไม่ตรงกัน');
		document.form.txtConPassword.focus();		
		return false;
	}
	if(document.form.Name.value == "")
	{
		alert('กรุณาใส่ชื่อของท่าน');
		document.form.Name.focus();		
		return false;
	}	
	if(document.form.Surname.value == "")
	{
		alert('กรุณาใส่นามสกุลของท่าน');
		document.form.Surname.focus();		
		return false;
	}	
	if(document.form.Address.value == "")
	{
		alert('ท่านไม่ได้กรอกที่อยู่');
		document.form.Address.focus();		
		return false;
	}	
	if(document.form.Tel.value == "")
	{
		alert('กรุณาใส่หมายเลขโทรศัพท์');
		document.form.Tel.focus();		
		return false;
	}	


	document.form.submit();
}
</script>


<div class="container">
<center>


<table width="947" height="787" border="0">
  <tr>
    <td width="131" align="center" valign="middle">&nbsp;</td>
    <td width="707">
      <script language="javascript">
function checkID(id)
{
if(id.length != 13) return false;
for(i=0, sum=0; i < 12; i++)
sum += parseFloat(id.charAt(i))*(13-i); if((11-sum%11)%10!=parseFloat(id.charAt(12)))
return false; return true;}

function checkForm()
{ 
	if(!checkID(document.form.IDCard.value))
	{
		do
		{
			var retVal = prompt("รหัสประชาชนไม่ถูกต้อง กรุณาใส่ใหม่อีกครั้ง : ", "หมายเลขประจำตัวประชาชน 13 หลัก");
		}
		while(!checkID(retVal))
		document.form.IDCard.value = retVal;
	}
}
</script>
      <form action="AddInsert.php" method="POST" enctype="multipart/form-data" name="form" id="form" OnSubmit="return fncSubmit();" >
        <center>
          <table width="692" height="370" align="center" >
            
            <tr valign="baseline">
              <td width="166" height="31" align="right" nowrap="nowrap" ><font color="black">Email :</td>
              <td width="514"><input name="Email" type="text" id="Email" placeholder="Email" value="" size="32" /> <font color="red">*
                
                </font></td>
              </tr>
            <tr valign="baseline">
              <td height="56" align="right" nowrap="nowrap"><font color="black">Password :<br>
                Confirmpassword :<br>
                <p>          <br>
                </p></td>
              <td><span id="sprypassword1">
                <label for=""></label>
                <input name="txtPassword" type="password" id="txtPassword" placeholder="Password">
                <span class="passwordRequiredMsg"></span></span><span id="spryconfirm1">
                  <font color="red">* </font><br>
                  <label for="txtConPassword"></label>
                  <label for="txtConPassword"></label>
                  <input type="password" name="txtConPassword" id="txtConPassword" placeholder="ConPassword">
                </span></td>
              </tr>
            <tr valign="baseline">
              <td height="27" align="right" nowrap="nowrap"><font color="black">Name :</td>
              <td><select name="Sex" id="Sex">
                <option value="Mr." <?php if (!(strcmp("Mr.", $row_Recordset1['']))) {echo "selected=\"selected\"";} ?>>Mr.</option>
                <option value="Mrs." <?php if (!(strcmp("Mrs.", $row_Recordset1['']))) {echo "selected=\"selected\"";} ?>>Mrs.</option>
                <option value="Miss" <?php if (!(strcmp("Miss", $row_Recordset1['']))) {echo "selected=\"selected\"";} ?>>Miss</option>
                </select>
                <input type="text" name="Name" placeholder="Name" value="" size="32" />
                <font color="red"> *</font></td>
              </tr>
            <tr valign="baseline">
              <td height="25" align="right" nowrap="nowrap"><font color="black">Surname:</td>
              <td><input type="text" name="Surname" placeholder="Surname" value="" size="32" />
                <font color="red"> *</font></td>
              </tr>
            <tr valign="baseline">
              <td height="117" align="right" valign="middle" nowrap="nowrap"><font color="black">Address(ที่อยู่):</td>
              <td><p>
                <br />
                <textarea name="Address" placeholder="ที่อยู่" id="Address" cols="45" rows="5"></textarea> 
                <font color="red">*</font></p></td>
            </tr>
            <tr valign="baseline">
              <td height="25" align="right" nowrap="nowrap"><font color="black">Tel(เบอร์ โทรศัพท์มือถือ):</td>
              <td><input name="Tel" placeholder="เบอร์โทร" type="text" value="" size="30" maxlength="10" onKeyUp="if(this.value*1!=this.value) this.value='' ;" >
                <font color="red">*</font><font color="black"></td>
              
              </tr> 
             
              <tr valign="baseline">
              <td height="25" align="right" nowrap="nowrap"><font color="black">กรุณาเลือกรูปภาพหรือไฟล์ในการอัพโหลด:</td>
              <td><input type="file" name="fileToUpload" id="fileToUpload" onKeyUp="if(this.value*1!=this.value) this.value='' ;" >
                <font color="red">*</font><font color="black"></td>
              
              </tr>
             <!-- <div class="row">
			<div class="col-4">
			</div>
			<div class="col-sm-4">
		    	กรุณาเลือกรูปภาพหรือไฟล์ในการอัพโหลด <br>
		    	<input type="file" name="fileToUpload" id="fileToUpload">
		   <!-- </div>
		</div>
		<div class="row">
  			<div class="col-sm-4">-->
    			<!--<input type="submit" value="Upload Image" name="submit">
  			</div>
		</div> -->

            <tr valign="baseline">
              <td height="57" align="right" nowrap="nowrap">&nbsp;</td>
              <td align="center" valign="middle"> <input name="Save" type="submit" id="Save" onclick="fncSubmit" value="สมัครสมาชิก" />
                <input type="reset" name="Re" id="Re" value="Reset">        &nbsp;
                &nbsp; &nbsp; &nbsp;&nbsp;</td>
              </tr>
          </table></center>
        <input type="hidden" name="MM_insert" value="form">
      </form><p>&nbsp;</p></td>
    <td width="95">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="middle">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</center>
