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
			
			if(document.forms[0].txtpassno.value == "")      { alert("Please Insert Passport No !"); return false;}
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
		     var workorderid = document.AddNewFCL.txtwoid.value
		     var companyname = document.AddNewFCL.txtcompname.value
			
			 var uri = "<?php echo site_url();?>/contRenewal/DeleteFCL/" + workorderid + "/" + companyname + "/" + id
             document.forms[0].action = uri;
             document.forms[0].method = "post";
             document.forms[0].submit();
		}
		
		function openemp(){
		
		var clabno = document.AddNewFCL.txtcompname.value;
		var url = "<?php echo site_url('contRenewal/empfcl_list');?>/" + clabno
		window.open(url, 'Upload FCL list', 'height=350, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes') 
		}
		function calcyor(){
		var dentry = document.forms[0].txtyrendate.value;
		var dnow = document.forms[0].txtcdate.value;
		document.forms[0].txtyren.value = getDateDiffInYears(dentry,dnow);
		}
		
		function same(){
		document.forms[0].txtnewpassno.value = document.forms[0].txtpassno.value;
		
		}
		
		function getDateDiffInYears(date1, date2) {
		  var dateParts1 = date1.split('-')
			, dateParts2 = date2.split('-')
			, d1 = new Date(dateParts1[0], dateParts1[1]-1, dateParts1[2])
			, d2 = new Date(dateParts2[0], dateParts2[1]-1, dateParts2[2])
		
		  return new Date(d2 - d1).getYear() - new Date(0).getYear() + 1;
		}
		
		function addtotrade(){
		
		if(document.getElementById("selwt").value != '0'){
				
			var existingtrade = document.AddNewFCL.txtworktrade.value;
			var newtradevalue = "";
				
			if(existingtrade.length ==0)
				newtradevalue = document.AddNewFCL.selwt.value;
			else 
				newtradevalue = existingtrade + ',' + document.AddNewFCL.selwt.value;				
				
				document.AddNewFCL.txtworktrade.value = newtradevalue;
		}
	}
	
	function cleartrade(){
		document.AddNewFCL.txtworktrade.value = "";
	}
</script>

</head>
<body>
<h4><a href="dashboard.php">SPIM</a>&nbsp;<img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" />&nbsp;Update Workorder&nbsp;<img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" />&nbsp;Edit FCL</h4>


<?php if(isset($successMsg)) echo "<font color=\"red\"><strong> $successMsg</strong></font>";?> <br />
<form action="<?php echo site_url();?>/contRenewal/SaveEditFCL" method="POST" name="AddNewFCL" id="AddNewFCL" onsubmit="return validate();">
<input type="hidden" name="txtcompname" value="<?php echo $companyname; ?>" />
<input type="hidden" name="txtid" value="<?php echo $id; ?>" />
<?php if($strhide == "delete"){?><input type="button" name="btnClose" value=" Close " onclick="closeAndRefresh();" /> 	
<?php }?>
<?php if($strhide != "delete"){?>
<strong>Contractor ID: <?php echo $companyname;?> </strong>
<br/>

<table width="100%" border="0">
<tr>
    <td>Workorder ID 2</td>
    <td colspan="3"><input type="text" name="txtwoid" value="<?php echo $workorderid; ?>" maxlength="250" size="20" readonly/></td>
</tr>
<tr>
   <td>Labour</td>
   <td colspan="3">
   <input type="text" size="60" name="empname" value="<?php echo $fcl->fcl_name ?>" />
   <input type="hidden" size="100" value="<?php echo $fcl->fcl_passno;?>" name="selemp"/><input type="button" value="..." onclick="openemp()"/>
   <input type="hidden" id="txtdob" name="txtdob"  value="<?php echo date('d-m-Y',strtotime($fcl->fcl_dob)) ?>" maxlength="250" size="20" readonly="readonly"/>
   <input name="txtgender" type="hidden" value="<?php echo $fcl->fcl_gender;?>" size="20" maxlength="30"  readonly="readonly"/></td>
</tr>

<tr>
    <td id="t_txtpassissue">Passport No <!--font color="red">*</font--></td>
    <td colspan="3"><input type="text" name="txtpassno" value="<?php echo $fcl->fcl_passno;?>" maxlength="30" size="20"  readonly/></tr>
<tr>
    <td id="t_txtpassissue">New Passport No <!--font color="red">*</font--></td>
    <td colspan="3"><input type="text" name="txtnewpassno" value="<?php echo $fcl->fcl_newpassno;?>" maxlength="30" size="20"  />
      <input type="button" value="Same As Above" onclick="same()"/></td>
</tr>
<tr>
    <td id="t_txtpermitno">Worker Permit</td>
    <td colspan="3"><input type="text" name="txtpermitno" maxlength="30" value="<?php echo $fcl->fcl_permitno ?>" size="20" /> </td>
</tr>

<tr>
  <td id="t_txtpassexp2">Permit Expiry Date</td>
  <td colspan="3"><input type="text" id="datepermitexp" name="datepermitexp"  value="<?php echo date('d-m-Y',strtotime($fcl->fcl_plksdate1)) ?>" maxlength="250" size="20" readonly/>
    <input id="btnpermitexpdate1" name="btnpermitexpdate1" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('datepermitexp'), this)" /> 
    to 
    <input name="datepermitexp2" type="text" id="datepermitexp2"  value="<?php echo date('d-m-Y',strtotime($fcl->fcl_plksdate2)) ?>" size="20" maxlength="250" readonly="readonly"/> <input id="btnpermitexpdate2" name="btnpermitexpdate2" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('datepermitexp2'), this)" /></td>
</tr>
<tr>
    <td id="t_txtpassexp">Passport Expired Date</td>
    <td colspan="3">
    <input type="text" id="txtpassexp" name="txtpassexp" value="<?php echo date('d-m-Y', strtotime($fcl->fcl_passexp));?>" maxlength="30" size="20" />
     <!--input id="btnpassexp" name="btnpassexp" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('txtpassexp'), this)" /-->    </td>
</tr>
<tr>
    <td id="t_txtpassissue">Nationality</td>
    <td colspan="3"><input type="text" name="txtnationality" value="<?php echo $fcl->fcl_nationality;?>" maxlength="30" size="20" /></td>
</tr>
<tr>
   <td id="t_txtnok">Year of Renewal</td>
   <td colspan="3"><input type="text" name="txtyren" value="<?php echo $fcl->fcl_year_renewal;?>" maxlength="1" size="20"  /><input type="hidden" name="txtyrendate" maxlength="30" size="20" /><input type="hidden" name="txtcdate" value="<?php echo date("Y-m-j")?>" maxlength="30" size="20" /></td>
</tr>
<tr>
   <td id="t_txtnok">Next Of Kin </td>
   <td colspan="3"><input type="text" name="txtnok" value="<?php echo $fcl->fcl_next_of_kin;?>" maxlength="30" size="20"    /></td>
</tr>
<tr>
   <td id="t_txtnok">Relationship</td>
   <td colspan="3"><input type="text" name="txtrelationship" value="<?php echo $fcl->fcl_relationship;?>" maxlength="30" size="20" /></td>
</tr>
<tr>
    <td id="t_txtsalary">Salary <!--font color="red">*</font--></td>
    <td colspa="3"><input type="text" name="txtsalary" value="<?php echo $fcl->fcl_salary;?>" maxlength="30" size="20" /></td>
</tr>
<tr>
    <td id="t_txtsalary">Worktrade <!--font color="red">*</font--></td>
    <td colspa="3">
    <!--select name="selwt" id="selwt" onchange='javascript:addtotrade();'>
    <option value=""></option>
    <?php foreach($allworktrade->result() as $worktrade){ ?>
    <option value="<?php echo $worktrade->trade_id;?>" <?php if($fcl->fcl_wt == $worktrade->trade_id) echo "SELECTED";?>><?php echo $worktrade->trade_id." - ".$worktrade->trade_desc;?></option>
    <?php } ?>
    </select-->
	<input type="text" name="txtworktrade" size="40" value="<?php echo $fcl->fcl_wt ?>"  />
	<!--input type="button" name="btnclear" value="Clear" class="smoothbtn1" onclick='javascript:cleartrade();'/--></td>
</tr>
<tr>
    <td>Workorder Type</td>
    <td colspan="3">
	<select name="selwotype">
	<option value=""></option>	
 	<?php foreach($allWOTYPE->result() as $wotype){ ?>	
 	<option value="<?php echo $wotype->mst_wo_type_id;?>" <?php if($fcl->fcl_wo_type == $wotype->mst_wo_type_id) echo "SELECTED";?>><?php echo $wotype->mst_wo_type_desc;?></option>	
 					<?php } ?>
	</select></td>
</tr>
<tr>
  <!--td>Special Pass</td>
  <td><input type="checkbox" name="chkpass" value="1" <?php if($fcl->fcl_pass == '1') echo "checked";?>/></td-->
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