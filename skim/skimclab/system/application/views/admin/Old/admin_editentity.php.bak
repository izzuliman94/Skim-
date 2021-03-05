<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM</title>
<link href="<?php echo base_url() ?>css/sippsstyle.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="<?php echo base_url() ?>js/switchcontent.js" >

/***********************************************
* Switch Content script- © Dynamic Drive (www.dynamicdrive.com)
* This notice must stay intact for legal use. Last updated April 05th, 2007.
* Visit http://www.dynamicdrive.com/ for full source code
***********************************************/

</script>
<script language="javascript">
function fillCategory(){
 // this function is used to fill the category list on load
addOption(document.entity_info.entity_type, "Hospital", "Hospital", "");
addOption(document.entity_info.entity_type, "Clinic", "Clinic", "");
addOption(document.entity_info.entity_type, "Lab", "Lab", "");
addOption(document.entity_info.entity_type, "Others", "Others", "");
}

function SelectSubCat(){
// ON selection of category this function will work

removeAllOptions(document.entity_info.entity_affiliation);

if(document.entity_info.entity_type.value == 'Hospital'){
addOption(document.entity_info.entity_affiliation,"Universiti", "Universiti");
addOption(document.entity_info.entity_affiliation,"JHEOA", "JHEOA");
addOption(document.entity_info.entity_affiliation,"Angkatan Tentera", "Angkatan Tentera");
addOption(document.entity_info.entity_affiliation,"KKM", "KKM");
addOption(document.entity_info.entity_affiliation,"Swasta", "Swasta");
addOption(document.entity_info.entity_affiliation,"Others", "Others");
}
if(document.entity_info.entity_type.value == 'Clinic'){
addOption(document.entity_info.entity_affiliation,"KKM", "KKM");
addOption(document.entity_info.entity_affiliation,"LPPKN ", "LPPKN ");
addOption(document.entity_info.entity_affiliation,"PPPKM", "PPPKM");
addOption(document.entity_info.entity_affiliation,"Swasta", "Swasta");
addOption(document.entity_info.entity_affiliation,"Others", "Others");
}
if(document.entity_info.entity_type.value == 'Lab'){
addOption(document.entity_info.entity_affiliation,"Government (MOH)", "Government (MOH)");
addOption(document.entity_info.entity_affiliation,"Government (non-MOH)", "Government (non-MOH)");
addOption(document.entity_info.entity_affiliation,"Swasta", "Swasta");
addOption(document.entity_info.entity_affiliation,"Others", "Others");
}
if(document.entity_info.entity_type.value == 'Others'){
addOption(document.entity_info.entity_affiliation,"Others", "Others");
}
}
//////////////////

function removeAllOptions(selectbox)
{
	var i;
	for(i=selectbox.options.length-1;i>=0;i--)
	{
		//selectbox.options.remove(i);
		selectbox.remove(i);
	}
}


function addOption(selectbox, value, text )
{
	var optn = document.createElement("OPTION");
	optn.text = text;
	optn.value = value;

	selectbox.options.add(optn);
}
</script>
<script language="JavaScript" src="<?php echo base_url()?>js/validator.js"></script>
</head>

<!--<body onload="fillCategory();">-->
<body>

<h4> System administration  <img src="<?php echo base_url() ?>images/right_arrow.gif" width="13" height="14" /> Edit Facility </h4>

<h2> Edit Facility </h2>

<div><a href="javascript:adminentity.sweepToggle('contract')">Contract All</a> | <a href="javascript:adminentity.sweepToggle('expand')">Expand All</a></div>

<h3 id="adminentity1-title" class="handcursor">Facility Information  <img src="<?php echo base_url() ?>images/down_arrow_org.gif" width="13" height="14" /></h3>
<div id="adminentity1" class="switchgroup1">
  <form action="<?php echo site_url('contSystemAdmin/editEntitySubmit');?>" method="POST" name="entity_info" id="entity_information" onsubmit="return v.exec()">
    <table width="100%" border="0">
      <tr>
        <td>Type<font color="#FF0000">*</font></td>
        <td>:</td>
        <td><SELECT  NAME="entity_type" <!--onChange="SelectSubCat();"-->>
      			<Option value="Hospital" <?php if($entityList->entity_type == "Hospital") echo "SELECTED";?>>Hospital</option>
      			<Option value="Clinic" <?php if($entityList->entity_type == "Clinic") echo "SELECTED";?>>Clinic</option>
      			<Option value="Lab" <?php if($entityList->entity_type == "Lab") echo "SELECTED";?>>Lab</option>
      			<Option value="Others" <?php if($entityList->entity_type == "Others") echo "SELECTED";?>>Others</option>
			</SELECT></td>
      </tr>
      <tr>
        <td id="t_affiliation">Category<font color="#FF0000">*</font> </td>
        <td>:</td>
        <td><?php $aff = $entityList->entity_affiliation;?>
        	<SELECT id="entity_affiliation" NAME="entity_affiliation">
        		<Option value="KKM" <?php if($aff == "KKM") echo "SELECTED";?>>KKM</option>
        		<option value="LPPKN" <?php if($aff == "LPPKN") echo "SELECTED";?>>LPPKN</option>
        		<option value="PPPKM" <?php if($aff == "PPPKM") echo "SELECTED";?>>PPPKM</option>
        		<option value="Swasta" <?php if($aff == "Swasta") echo "SELECTED";?>>Swasta</option>
        		<option value="Universiti" <?php if($aff == "Universiti") echo "SELECTED";?>>Universiti</option>
        		<option value="JHOEA" <?php if($aff == "JHOEA") echo "SELECTED";?>>JHOEA</option>
        		<option value="Angkatan Tentera" <?php if($aff == "Angkatan Tentera") echo "SELECTED";?>>Angkatan Tentera</option>
        		<option value="Public Health Labs" <?php if($aff == "Public Health Labs") echo "SELECTED";?>>Public Health Labs</option>
        		<option value="Other Government Clinics" <?php if($aff == "Other Government Clinics") echo "SELECTED";?>>Other Government Clinics</option>
        		<option value="Others" <?php if($aff == "Others") echo "SELECTED";?>>Others</option>
			</SELECT></td>
      </tr>
      <tr>
        <td id="t_name">Name<font color="#FF0000">*</font> </td>
        <td>:</td>
        <td><input name="entity_name" type="text" size="100" value="<?php echo $entityList->entity_name;?>" maxlength="150"/></td>
      </tr>
      <tr>
        <td>Facility Code</td>
        <td>:</td>
        <td><input name="entity_code" type="text" size="100" value="<?php echo $entityList->entity_code;?>" maxlength="150"/></td>
      </tr>
	  <tr>
        <td id="t_addr1">Address 1<font color="#FF0000">*</font> </td>
        <td>:</td>
        <td><input name="entity_add1" type="text" size="100" value="<?php echo $entityList->entity_add1;?>" maxlength="150" /></td>
      </tr>
      <tr>
        <td>Address 2 </td>
        <td>:</td>
        <td><input name="entity_add2" type="text" size="100" value="<?php echo $entityList->entity_add2;?>" maxlength="150" /></td>
      </tr>
      <tr>
        <td>Postcode</td>
        <td>:</td>
        <td><input name="entity_postcode" type="text" size="20" value="<?php echo $entityList->entity_postcode;?>" maxlength="5" /></td>
      </tr>
      <tr>
        <td>Town</td>
        <td>:</td>
        <td><input name="entity_town" type="text" size="20" value="<?php echo $entityList->entity_town;?>" maxlength="20" /></td>
      </tr>
      <tr>
        <td>State</td>
        <td>:</td>
        <td>
        	<SELECT name="entity_state">
        	<?php foreach($states->result() as $row){
        	?>
        		<option value="<?php echo $row->state_id;?>" <?php if($entityList->entity_state == $row->state_id) echo "SELECTED";?>><?php echo $row->state_name;?></option>
        	<?php
        	}
        	?>
        	</SELECT>
      </tr>
	  <tr>
        <td>Phone No 1 </td>
        <td>:</td>
        <td><input name="entity_phone1" type="text" size="20" value="<?php echo $entityList->entity_phone1;?>" maxlength="20" /></td>
      </tr>
      <tr>
        <td>Phone No 2 </td>
        <td>:</td>
        <td><input name="entity_phone2" type="text" size="20" maxlength="20" value="<?php echo $entityList->entity_phone2;?>"/></td>
      </tr>
      <tr>
        <td>Contact Person </td>
        <td>:</td>
        <td><input name="entity_contactperson" type="text" size="50" maxlength="50" value="<?php echo $entityList->entity_contactperson;?>"/></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>
          <input type="hidden" name="entity_id" value="<?php echo $entityList->entity_id;?>" />
          <input type="submit" name="btnEntitySave" value="Save" class="btnform"/>
     	  <input type="button" name="btnCancel" value=" Cancel " onclick="history.back();" />
        </td>
      </tr>
    </table>

    <!--javascript for form validation-->
    <script>
	// form fields description structure
	var a_fields = {
		'entity_name': {
			'l': 'Name',  // label
			'r': true,    // required
			't': 't_name'// id of the element to highlight if input not validated
		},
		'entity_add1':{'l':'Address 1','r':true,'t':'t_addr1'}
	},

	o_config = {
		'to_disable' : ['Submit', 'Reset'],
		'alert' : 1
	}

	// validator constructor call
	var v = new validator('entity_info', a_fields, o_config);

	</script>
    <!--END OF FORM VALIDATION JAVASCRIPT-->
    <script type="text/javascript">
//   MAIN FUNCTION: new switchcontent("class name", "[optional_element_type_to_scan_for]") REQUIRED
//1) Instance.setStatus(openHTML, closedHTML)- Sets optional HTML to prefix the headers to indicate open/closed states
//2) Instance.setColor(openheaderColor, closedheaderColor)- Sets optional color of header when it's open/closed
//3) Instance.setPersist(true/false)- Enables or disabled session only persistence (recall contents' expand/contract states)
//4) Instance.collapsePrevious(true/false)- Sets whether previous content should be contracted when current one is expanded
//5) Instance.defaultExpanded(indices)- Sets contents that should be expanded by default (ie: 0, 1). Persistence feature overrides this setting!
//6) Instance.init() REQUIRED

var adminentity=new switchcontent("switchgroup1", "div") //Limit scanning of switch contents to just "div" elements
//bobexample.setStatus('<img src="http://img242.imageshack.us/img242/5553/opencq8.png" /> ', '<img src="http://img167.imageshack.us/img167/7718/closedy2.png" /> ')
adminentity.setColor('darkred', 'black')
adminentity.setPersist(true)
adminentity.collapsePrevious(true) //Only one content open at any given time
adminentity.init()
    </script>
</form>
</div>
</body>
</html>