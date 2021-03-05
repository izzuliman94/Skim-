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
<script language="javascript" src="<?php echo base_url()?>js/facilityLists.js"></script>
<script language="JavaScript" src="<?php echo base_url()?>js/validator.js"></script>
</head>

<body onload="fillCategory();">

<h4> System administration  <img src="<?php echo base_url(); ?>images/right_arrow.gif" width="13" height="14" /> Add Facility </h4>

<h2> Add Facility </h2>

<div><a href="javascript:adminentity.sweepToggle('contract')">Contract All</a> | <a href="javascript:adminentity.sweepToggle('expand')">Expand All</a></div>

<h3 id="adminentity1-title" class="handcursor">Facility Information  <img src="<?php echo base_url() ?>images/down_arrow_org.gif" width="13" height="14" /></h3>
<div id="adminentity1" class="switchgroup1">
  <form action="<?php echo site_url('contSystemAdmin/addEntity');?>" method="post" name="entity_info" id="entity_information" onsubmit="return v.exec()">
    <table width="100%" border="0">
      <tr>
        <td>Type<font color="#FF0000">*</font></td>
        <td>:</td>
        <td><SELECT  NAME="entity_type" onChange="SelectSubCat();">
      			<Option value="">- Select Facility type -</option>
			</SELECT></td>
      </tr>
      <tr>
        <td id="t_affiliation">Category<font color="#FF0000">*</font> </td>
        <td>:</td>
        <td><SELECT id="entity_affiliation" NAME="entity_affiliation">
			</SELECT></td>
      </tr>
      <tr>
        <td id="t_name">Name<font color="#FF0000">*</font> </td>
        <td>:</td>
        <td><input name="entity_name" type="text" size="100" maxlength="150"/></td>
      </tr>
      <tr>
        <td id="t_name">Facility Code</td>
        <td>:</td>
        <td><input name="entity_code" type="text" size="100" maxlength="30"/></td>
      </tr>
	  <tr>
        <td id="t_addr1">Address 1<font color="#FF0000">*</font> </td>
        <td>:</td>
        <td><input name="entity_add1" type="text" size="100" maxlength="150" /></td>
      </tr>
      <tr>
        <td>Address 2 </td>
        <td>:</td>
        <td><input name="entity_add2" type="text" size="100" maxlength="150" /></td>
      </tr>
      <tr>
        <td>Postcode</td>
        <td>:</td>
        <td><input name="entity_postcode" type="text" size="20" maxlength="10" /></td>
      </tr>
      <tr>
        <td>Town</td>
        <td>:</td>
        <td><input name="entity_town" type="text" size="20" maxlength="20" /></td>
      </tr>
      <tr>
        <td>State</td>
        <td>:</td>
        <td>
        	<SELECT name="entity_state">
        	<?php foreach($states->result() as $row){
        	?>
        		<option value="<?php echo $row->state_id;?>"><?php echo $row->state_name;?></option>
        	<?php
        	}
        	?>
        	</SELECT>
      </tr>
	   <tr>
        <td>Phone No 1 </td>
        <td>:</td>
        <td><input name="entity_phone1" type="text" size="20" maxlength="20" /></td>
      </tr>
      <tr>
        <td>Phone No 2 </td>
        <td>:</td>
        <td><input name="entity_phone2" type="text" size="20" maxlength="20" /></td>
      </tr>
      <tr>
        <td>Contact Person </td>
        <td>:</td>
        <td><input name="entity_contactperson" type="text" size="50" maxlength="50" /></td>
      </tr>
      <tr>
        <td><input name="entity_status" type="hidden" value="1" /></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><label>
          <input type="submit" name="btnEntitySave" value="Save" class="btnform"/>
        </label>
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
