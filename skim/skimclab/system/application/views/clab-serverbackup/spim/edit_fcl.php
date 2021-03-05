<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM - SPIM</title>
<link href="<?php echo base_url();?>/css/sippsstyle.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>js/scwdatepicker/scw.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url();?>js/scwdatepicker/scw.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>/js/switchcontent.js" ></script>
<script type="text/javascript">
        function datebutton_onclick(elementId, thisRef)
        {
	        switch (scwVisibilityStatus)
	        {
		        case "hidden":
			        scwShow(document.getElementById(elementId), thisRef);
			        break;
		        case "visible":
			        scwHide();
	        }
        }
  
  
		//to refresh the main page when close button is hit
        function closeAndRefresh()
        {
	        window.opener.location.href=window.opener.location.href; // refresh the main page
			window.opener.focus(); // focus on the main page
			window.close(); // close the popup page
        }
		
		function validate(){
			
			//if(document.forms[0].txtpassno.value == "")      { alert("Please Insert Passport No !"); return false;}
			if(document.forms[0].txtname.value == "")        { alert("Please Insert Labour Name !"); return false;}
			if(document.forms[0].txtdob.value == "")         { alert("Please Insert Date Of Birth !"); return false;}
			if(document.forms[0].txtpof.value == "")         { alert("Please Insert Place Of Birth !"); return false;}
			if(document.forms[0].selnationality.value == "") { alert("Please Select Nationality !"); return false;}
			if(document.forms[0].selgender.value == "") { alert("Please Select Gender !"); return false;}
		    if(document.forms[0].txtpassissue.value == "") { alert("Please Insert Passport Issue !"); return false;}
			if(document.forms[0].txtpassexp.value == "") { alert("Please Insert Passport Expired !"); return false;}
			if(document.forms[0].txtsalary.value == "") { alert("Please Insert Salary !"); return false;}
			if(document.forms[0].txtworktrade.value == "") { alert("Please Select Worktrade !"); return false;}
			
		}
		
		function FCLdelete(id){
			
			 var id = id;
		     var workorderid = document.EditFCL.txtwoid.value
		     var companyname = document.EditFCL.txtcompname.value
			
			 var uri = "<?php echo site_url();?>/contSpim/DeleteFCL/" + workorderid + "/" + companyname + "/" + id
             document.forms[0].action = uri;
             document.forms[0].method = "post";
             document.forms[0].submit();
		}
		
		function getcountry(){
		     var frm = "update";
		     var url = "<?php echo site_url('contSpim/getcountry');?>/" + frm
window.open(url, 'Country list', 'height=350,width=700, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes') 
		}
		
		function addtotrade(){
		
		if(document.getElementById("selwt").value != '0'){
				
			var existingtrade = document.EditFCL.txtworktrade.value;
			var newtradevalue = "";
				
			if(existingtrade.length ==0)
				newtradevalue = document.EditFCL.selwt.value;
			else 
				newtradevalue = existingtrade + ',' + document.EditFCL.selwt.value;				
				
				document.EditFCL.txtworktrade.value = newtradevalue;
		}
	}
	
	function cleartrade(){
		document.EditFCL.txtworktrade.value = "";
	}
</script>

</head>
<body>
<h4><a href="dashboard.php">SPIM</a>&nbsp;<img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" />&nbsp;Update Workorder&nbsp;<img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" />&nbsp;Edit FCL</h4>


<?php if(isset($successMsg)) echo "<font color=\"red\"><strong> $successMsg</strong></font>";?> <br />
<form action="<?php echo site_url();?>/contSPIM/SaveEditFCL" method="POST" name="EditFCL" id="EditFCL" onsubmit="return validate();">
<input type="hidden" name="txtcompname" value="<?php echo $companyname; ?>" />
<input type="hidden" name="txtid" value="<?php echo $id; ?>" />
<?php if($strhide == "delete"){?><input type="button" name="btnClose" value=" Close " onclick="closeAndRefresh();" /> 	<?php }?>
<?php if($strhide != "delete"){?>
<strong>Cotractor ID: <?php echo $companyname;?> </strong>
</br>

<table width="100%" border="0">
<tr>
    <td>Workorder ID</td>
    <td colspan="3"><input type="text" name="txtwoid" value="<?php echo $workorderid; ?>" maxlength="250" size="20" readonly/></td>
</tr>
<tr>
    <td>PLKS No.</td>
	<td><input type="text" name="txtplksno" value="<?php echo $fcl->fcl_plksno;?>" maxlength="250"  size="20"/></td>
</tr>
<tr> 	
    <td id="t_txtpassno">Passport No. <!--font color="red">*</font--></td>
 	<td colspan="3"><?php echo $fcl->fcl_passno;?><input type="hidden" name="txtpassno" value="" maxlength="30" size="20" ></td>
</tr>
<tr>
 	<td id="t_txtname">Name <font color="red">*</font></td>
 	<td colspan="3"><input type="text" name="txtname" value="<?php echo $fcl->fcl_name;?>" maxlength="250" size="70" /></td>
</tr>
<tr>
    <td id="t_txtdob">Date Of Birth <font color="red">*</font></td>
    <td colspan="3">
    <input type="text" id="txtdob" name="txtdob"  value="<?php echo date('d-m-Y', strtotime($fcl->fcl_dob));?>" maxlength="250" size="20" readonly/>
    <input id="btndob" name="btndob" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('txtdob'), this)" />    </td>
</tr>
<tr>
 	<td id="t_txtpof">Place Of Birth <font color="red">*</font></td>
 	<td colspan="3"><input type="text" name="txtpof" value="<?php echo $fcl->fcl_bthplace;?>" maxlength="30" size="20" /></td>
</tr>
<tr>
    <td id="t_selcountry">Country <font color="red">*</font></td>
    <td colspan="3">
    <!--select name="selcountry">
    <option value=""></option>
    <?php foreach($allCountries->result() as $countries){ ?>
    <option value="<?php echo $countries->cty_id;?>" <?php if($fcl->fcl_country == $countries->cty_id) echo "SELECTED";?>><?php echo $countries->cty_desc;?></option>
    <?php } ?>
    </select-->
	<input type="text" name="selcountrydesc" value="<?php echo $fcl->cty_desc;?>"/>
	<input type="hidden" name="selcountry" value="<?php echo $fcl->cty_id;?>"/> 
	<input type="button" value="..." onclick="getcountry()"/>    </td>
</tr>
<tr>
    <td id="t_selnationality">Nationality <font color="red">*</font></td>
    <td colspan="3">
    <!--select name="selnationality">
    <option value=""></option>
    <?php foreach($allNationalities->result() as $nationality){ ?>
    <option value="<?php echo $nationality->nat_id;?>" <?php if($fcl->fcl_nationality == $nationality->nat_id) echo "SELECTED";?>><?php echo $nationality->nat_desc;?></option>
    <?php } ?>
    </select-->
	<input type="text" name="selnationalitydesc" value="<?php echo $fcl->nat_desc;?>"/>
	<input type="hidden" name="selnationality" value="<?php echo $fcl->nat_id;?>"/>    </td>
</tr>
<tr>
    <td id="t_selgender">Gender <font color="red">*</font></td>
    <td colspan="3">
    <select name="selgender">
    <option value=""></option>
    <option value="1" <?php if($fcl->fcl_gender == "1") echo "SELECTED";?>>MALE</option>
    <option value="2" <?php if($fcl->fcl_gender == "2") echo "SELECTED";?>>FEMALE</option>
    </select>    </td>
</tr>
<tr>
    <td id="t_txtpassissue">Passport Issue <font color="red">*</font></td>
    <td colspan="3"><input type="text" name="txtpassissue" value="<?php echo $fcl->fcl_passissue;?>" maxlength="30" size="20" /></td>
</tr>
<tr>
    <td id="t_txtpassexp">Passport Expired <font color="red">*</font></td>
    <td colspan="3">
    <input type="text" id="txtpassexp" name="txtpassexp" value="<?php echo date('d-m-Y', strtotime($fcl->fcl_passexp));?>" maxlength="30" size="20" />
     <input id="btnpassexp" name="btnpassexp" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('txtpassexp'), this)" />    </td>
</tr>
<tr>
   <td id="t_txtnok">Next Of Kin </td>
   <td colspan="3"><input type="text" name="txtnok" value="<?php echo $fcl->fcl_next_of_kin;?>" maxlength="30" size="20" /></td>
</tr>
<tr>
  <td id="t_txtnok2">Address</td>
  <td colspan="3"><textarea name="txtaddarea" cols="30"><?php echo $fcl->fcl_add ?></textarea></td>
</tr>
<tr>
   <td id="t_txtnok">Relationship</td>
   <td colspan="3"><input type="text" name="txtrelationship" value="<?php echo $fcl->fcl_relationship;?>" maxlength="30" size="20" /></td>
</tr>
<tr>
    <td id="t_txtsalary">Salary <font color="red">*</font></td>
    <td colspa="3"><input type="text" name="txtsalary" value="<?php echo $fcl->fcl_salary;?>" maxlength="30" size="20" /></td>
</tr>
<tr>
    <td id="t_txtsalary">Worktrade <font color="red">*</font></td>
    <td colspa="3">
    <select name="selwt" id="selwt" onchange='javascript:addtotrade();'>
    <option value=""></option>
    <?php foreach($allworktrade->result() as $worktrade){ ?>
    <option value="<?php echo $worktrade->trade_id;?>" <?php if($fcl->fcl_wt == $worktrade->trade_id) echo "SELECTED";?>><?php echo $worktrade->trade_id ." - ".$worktrade->trade_desc;?></option>
    <?php } ?>
    </select><input type="text" name="txtworktrade" size="40" value="<?php echo $fcl->fcl_wt?>" READONLY />
	<input type="button" name="btnclear" value="Clear" class="smoothbtn1" onclick='javascript:cleartrade();'/></td>
</tr>
<tr>
  <td>Special Pass</td>
  <td><input type="checkbox" name="chkpass" value="1" <?php if($fcl->fcl_pass == '1') echo "checked";?>/></td>
</tr>
<tr>
    <td colspan="4" align="center">
    <input type="submit" name="Save" value="Save" onclick="return confirm('Are you sure you want to save?');"/>
    <input type="button" name="Delete" value="Delete" onclick="FCLdelete('<?php echo $id; ?>')"/>
    <input type="button" name="btnClose" value=" Close " onclick="closeAndRefresh();" />    </td>
</tr>
</table>
<?php } ?>

</form>

</body>