<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM</title>
<link href="<?php echo base_url();?>/css/sippsstyle.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="<?php echo base_url();?>/js/switchcontent.js" >

/***********************************************
* Switch Content script- © Dynamic Drive (www.dynamicdrive.com)
* This notice must stay intact for legal use. Last updated April 05th, 2007.
* Visit http://www.dynamicdrive.com/ for full source code
***********************************************/

</script>
<script language="JavaScript" src="<?php echo base_url()?>js/validator.js"></script>
<!--new calendar-->
 <link href="<?php echo base_url();?>js/scwdatepicker/scw.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="<?php echo base_url();?>js/scwdatepicker/scw.js"></script>
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
    </script>	
</head>

<body>
<h4><a href="<?php echo site_url();?>/contLabour/labourDashbrd">Labour</a><img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" /> Assign Company </h4>

<h3 id="switchsection1-title" class="handcursor">Assign Company   <img src="<?php echo base_url();?>/images/down_arrow_org.gif" width="13" height="14" /></h3>
<div id="switchsection1" class="switchgroup1"> 
<form method="POST" action="<?php echo site_url();?>/contLabour/assignCompanyPt2Submit" name="frmAssignComp" id="frmAssignComp" onsubmit="return v.exec()">  
 	<table width="100%" border="0">
 		<tr>
 			<th colspan="5" align="LEFT">Labour Details</th>
 		</tr>
 		<tr>
 			<td rowspan="4" width="18%" valign="bottom">&nbsp;</td>
 			<td width="18%">Passport No</td>
 			<td width="23%"><input type="text" name="" maxlength="" value="<?php echo $labor->wkr_passno;?>" READONLY/></td>
 			<td width="18%">Green Card No.</td>
 			<td width="23%"><input type="text" name="" maxlength="" value="" READONLY/></td>
 		</tr>
 		<tr>
 			<td>Name</td>
 			<td><input type="text" name="" maxlength="" size="35" value="<?php echo $labor->wkr_name;?>" READONLY/></td>
 			<td>Movement Status</td>
 			<td></td>
 		</tr>
 		<tr>
 			<td>Old Passport No.</td>
 			<td><input type="text" name="" maxlength="" size="35" value="<?php echo $labor->wkr_oldpassno;?>" READONLY/></td>
 			<td>Amnesty Ref. No</td>
 			<td><input type="text" name="" maxlength="" READONLY/></td>
 		</tr>
 		 		<tr>
 			<td>&nbsp;</td>
 			<td colspan="4">&nbsp;</td>
 		</tr>
 		<tr>
 			<td>Date of Birth</td>
 			<td colspan="2"><input type="text" name="" maxlength="" id="dtDOB" value="<?php if(isset($labor->wkr_dob)) echo date('d-m-Y', strtotime($labor->wkr_dob));?>" READONLY/>
 				&nbsp; &nbsp; Age: <input type="text" name="" size="5" DISABLED/>
 			</td>
 			<td>Gender</td>
 			<td>
 				<SELECT name="gender" DISABLED>
 					<option value=""></option>
 					<OPTION value="1" SELECTED>MALE</option>
 					<OPTION value="2">FEMALE</option>
 				</SELECT>
 			</td>
 		</tr>
 		<tr>
 			<td>Race/Ethnic</td>
 			<td colspan="2">
 				<SELECT name="race" DISABLED>
 					<option value=""></option>	
 					<?php foreach($allRaces->result() as $race){ ?>	
 					<option value="<?php echo $race->race_id;?>" <?php if($labor->wkr_race == $race->race_id) echo "SELECTED";?>><?php echo $race->race_desc;?></option>	
 					<?php } ?>
 				</SELECT>
 			</td>
 			<td>Nationality</td>
 			<td>
 				<SELECT name="nationality"  DISABLED>
 					<option value=""></option>	
 					<?php foreach($allNationalities->result() as $nationality){ ?>	
 					<option value="<?php echo $nationality->nat_id;?>" <?php if($labor->wkr_nationality == $nationality->nat_id) echo "SELECTED";?>><?php echo $nationality->nat_desc;?></option>	
 					<?php } ?>
 				</SELECT>
 			</td>
 		</tr>
 		<tr>
 			<td>&nbsp;</td>
 			<td colspan="4">&nbsp;</td>
 		</tr>
 		<tr>
 			<td rowspan="2">Home Address</td>
 			<td rowspan="2" colspan="2"><textarea name="" cols="50" rows="1" READONLY><?php echo $labor->wkr_homeaddr;?></textarea></td>
 			<td>Zipcode</td>
 			<td><input type="text" name="" maxlength="" value="<?php echo $labor->wkr_zipcode;?>"  READONLY/></td>
 		</tr>
 		<tr>
 			<td>Country</td>
 			<td colspan="2">
 				<SELECT name="country" DISABLED>
 					<option value=""></option>	
 					<?php foreach($allCountries->result() as $country){ ?>	
 					<option value="<?php echo $country->cty_id;?>" <?php if($labor->wkr_country == $country->cty_id) echo "SELECTED";?>><?php echo $country->cty_desc;?></option>	
 					<?php } ?>
 				</SELECT>
 			</td>
 		</tr>
 		<tr>
 			<td rowspan="2">Current Address</td>
 			<td rowspan="2" colspan="2"><textarea name="" cols="50" rows="2" READONLY><?php echo $labor->wkr_address1;?> <?php echo $labor->wkr_address2;?> <?php echo $labor->wkr_address3;?></textarea></td>
 			<td>Postcode</td>
 			<td><input type="text" name="" maxlength="" value="<?php echo $labor->wkr_pcode;?>" READONLY/></td>
 		</tr>
 		<tr>
 			<td>State</td>
 			<td colspan="2"><SELECT name="state" DISABLED>
 					<option value=""></option>	
 					<?php foreach($allStates->result() as $state){ ?>	
 					<option value="<?php echo $state->state_id;?>" <?php if($labor->wkr_state == $state->state_id) echo "SELECTED";?>><?php echo $state->state_name;?></option>	
 					<?php } ?>
 				</SELECT>
 			</td>
 		</tr>
 		<tr>
 			<td>Date Entry (M'sia)</td>
 			<td colspan="2"><input type="text" name="" maxlength="" value="<?php if(isset($labor->wkr_entrydate)) echo date('d-m-Y', strtotime($labor->wkr_entrydate));?>" READONLY/></td>
 			<td>No. of year in M'sia</td>
 			<td><input type="text" name="" maxlength="" value=""  READONLY/></td>
 		</tr>
 		<tr>
 			<td>Permit Expiry Date</td>
 			<td colspan="2"><input type="text" name="" maxlength="" value="<?php if($labor->wkr_passexp != '0000-00-00') echo date('d-m-Y', strtotime($labor->wkr_permitexp));?>" READONLY/></td>
 			<td>Current PLKS No.</td>
 			<td><input type="text" name="" maxlength="" value="<?php echo $labor->wkr_plksno;?>" READONLY/></td>
 		</tr>
 		<tr>
 			<td>Passport Expiry Date</td>
 			<td colspan="2"><input type="text" name="" maxlength="" value="<?php if(strlen($labor->wkr_passexp) > 0 && $labor->wkr_passexp != '0000-00-00') echo date('d-m-Y', strtotime($labor->wkr_passexp));?>" READONLY/></td>
 			<td>&nbsp;</td>
 			<td>&nbsp;</td>
 		</tr>
 		<tr>
 			<td>&nbsp;</td>
 			<td colspan="4">&nbsp;</td>
 		</tr>
 		<tr>
 			<th colspan="5" align="LEFT">Assign Company</th>
 		</tr>
 		<tr>
 			<td id="t_selcompany">Company</td>
 			<td colspan="4">
 				<SELECT name="selcompany">
 					<option value="" SELECTED>&nbsp;</option>
 				<?php foreach($allContractors->result() as $ctr){
	 			?>
	 				<option value="<?php echo $ctr->ctr_clab_no;?>"><?php echo $ctr->ctr_comp_name;?></option>
	 			<?php }
	 			?>
	 			</SELECT>
 			</td>
 		</tr>
 		<tr>
 			<td>Date Hired</td>
 			<td colspan="4"><input type="text" name="dthired" id="dthired" value="<?php echo date('d-m-Y');?>"/>
 				<input id="button1" name="btnDate1" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dthired'), this)" />		
 			</td>
 		</tr>
 		<tr>
 			<td>Assigned by</td>
 			<td colspan="2"><input type="text" size="30" name="txtassignedby" value="<?php echo $this->session->userdata('username');?>" /></td>
 			<td>Assigned date</td>
 			<td>
 				<input type="text" name="dtassigned" id="dtassigned" value="<?php echo date('d-m-Y');?>" />
 				<input id="button2" name="btnDate2" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtassigned'), this)" />
 			</td>
 		</tr>
 		<tr>
 			<td colspan="5" align="Center">
 				<input type="hidden" name="txtwkrid" value="<?php echo $labor->wkr_id;?>" />
 				<input type="hidden" name="txtpassno" value="<?php echo $labor->wkr_passno;?>" />
 				<input type="hidden" name="txtwkrname" value="<?php echo $labor->wkr_name;?>" />
 				<input type="submit" name=" Assign Company " value=" Assign Company " onclick="return confirm('Are you sure you want to assign company for this worker?');"/>
 				<input type="button" name="Back" value=" Back " onclick="history.back();"/>
 			</td>
 		</tr>
 	</table>
</form>	   

<!--JAVASCRIPT FOR FORM VALIDATION-->
    <script>
	// form fields description structure
	var a_fields = {
		'selcompany': {
			'l': 'SELECT Company',  // label
			'r': true,    // required
			't': 't_selcompany'// id of the element to highlight if input not validated
		}
	},

	o_config = {
		'to_disable' : ['Submit', 'Reset'],
		'alert' : 1
	}

	// validator constructor call
	var v = new validator('frmAssignComp', a_fields, o_config);

	</script>
    <!--END OF FORM VALIDATION JAVASCRIPT-->
    
</div>
<p>

 

      <script type="text/javascript">
//   MAIN FUNCTION: new switchcontent("class name", "[optional_element_type_to_scan_for]") REQUIRED
//1) Instance.setStatus(openHTML, closedHTML)- Sets optional HTML to prefix the headers to indicate open/closed states
//2) Instance.setColor(openheaderColor, closedheaderColor)- Sets optional color of header when it's open/closed
//3) Instance.setPersist(true/false)- Enables or disabled session only persistence (recall contents' expand/contract states)
//4) Instance.collapsePrevious(true/false)- Sets whether previous content should be contracted when current one is expanded
//5) Instance.defaultExpanded(indices)- Sets contents that should be expanded by default (ie: 0, 1). Persistence feature overrides this setting!
//6) Instance.init() REQUIRED

var switchsection=new switchcontent("switchgroup1", "div") //Limit scanning of switch contents to just "div" elements
//bobexample.setStatus('<img src="http://img242.imageshack.us/img242/5553/opencq8.png" /> ', '<img src="http://img167.imageshack.us/img167/7718/closedy2.png" /> ')
switchsection.setColor('darkred', 'black')
switchsection.setPersist(true)
switchsection.collapsePrevious(true) //Only one content open at any given time
switchsection.init()
    </script>
</p>

</body>
</html>
