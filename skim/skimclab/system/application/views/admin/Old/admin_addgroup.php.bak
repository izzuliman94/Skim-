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
<script language="JavaScript" src="<?php echo base_url()?>js/validator.js"></script>
</head>

<body>

<h4> System administration  <img src="<?php echo base_url() ?>images/right_arrow.gif" width="13" height="14" /> Add Group </h4>

<h2> Add Group </h2>

<div><a href="javascript:admindashbrd.sweepToggle('contract')">Contract All</a> | <a href="javascript:admindashbrd.sweepToggle('expand')">Expand All</a></div>

<h3 id="admindashbrd1-title" class="handcursor">Group Information  <img src="<?php echo base_url() ?>images/down_arrow_org.gif" width="13" height="14" /></h3>
<div id="admindashbrd1" class="switchgroup1">
  <form action="<?php echo site_url('contSystemAdmin/addGroup');?>" method="post" name="group_information" id="user_information" onsubmit="return v.exec()">
    <font color="#FF0000"><?php if(isset($errorMsg)) echo $errorMsg;?></font>
    <table width="100%" border="0">
      <tr>
        <td id="t_name">Name<font color="#FF0000">*</font></td>
        <td>:</td>
        <td><input name="group_name" type="text" size="50" maxlength="100"/></td>
      </tr>
      <tr>
        <td>Description</td>
        <td>:</td>
        <td><input name="group_desc" type="text" size="130" maxlength="150" /></td>
      </tr>
      <tr>
        <td>Default Page </td>
        <td>:</td>
        <td><select name="group_defaultpage">
            	<option value="contCallDashboard">Call Dashboard</option>
            	<option value="contClinic/clinicDashbrdEntityBased">Clinic Module</option>
            	<option value="contLab">Lab Module</option>
            	<option value="contSystemAdmin/sysAdminDashbrd">System Admin Dashboard</option>
            </select>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="3"><h3>SPECIFY ACCESS RIGHT</h3></td>
      </tr>

      <?php
      $prevcategory ="";
      foreach ($sitemaps->result() as $row):
      	$nextcategory = $row->sitemap_category;
      	if($prevcategory != $nextcategory){
      		$prevcategory = $nextcategory;
      ?>
      <tr>
        <td colspan="3"><h4><?php echo $row->sitemap_category;?></h4></td>
      </tr>
      <?php 	} //end if
      ?>
      <tr>
        <td colspan="3"><input type="checkbox" name="sitemaps[]" value="<?php echo $row->sitemap_name;?>"> &nbsp; <?php echo $row->sitemap_name;?></td>
      </tr>
      <?php endforeach; ?>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="3" align="center"><label>
          <input type="submit" name="btnUserSave" value="Save" />
     	  <input type="reset" name="btnReset" value="Reset" />
        </label>
        </td>
      </tr>
    </table>
</form>
<!--javascript for form validation-->
    <script>
	// form fields description structure
	var a_fields = {
		'group_name': {
			'l': 'Group name',  // label
			'r': true,    // required
			't': 't_name'// id of the element to highlight if input not validated
		}
	},

	o_config = {
		'to_disable' : ['Submit', 'Reset'],
		'alert' : 1
	}

	// validator constructor call
	var v = new validator('group_information', a_fields, o_config);

	</script>
    <!--END OF FORM VALIDATION JAVASCRIPT-->
</div>

  <script type="text/javascript">
//   MAIN FUNCTION: new switchcontent("class name", "[optional_element_type_to_scan_for]") REQUIRED
//1) Instance.setStatus(openHTML, closedHTML)- Sets optional HTML to prefix the headers to indicate open/closed states
//2) Instance.setColor(openheaderColor, closedheaderColor)- Sets optional color of header when it's open/closed
//3) Instance.setPersist(true/false)- Enables or disabled session only persistence (recall contents' expand/contract states)
//4) Instance.collapsePrevious(true/false)- Sets whether previous content should be contracted when current one is expanded
//5) Instance.defaultExpanded(indices)- Sets contents that should be expanded by default (ie: 0, 1). Persistence feature overrides this setting!
//6) Instance.init() REQUIRED

var admindashbrd=new switchcontent("switchgroup1", "div") //Limit scanning of switch contents to just "div" elements
//bobexample.setStatus('<img src="http://img242.imageshack.us/img242/5553/opencq8.png" /> ', '<img src="http://img167.imageshack.us/img167/7718/closedy2.png" /> ')
admindashbrd.setColor('darkred', 'black')
admindashbrd.setPersist(true)
admindashbrd.collapsePrevious(true) //Only one content open at any given time
admindashbrd.init()
  </script>
</h3>
</body>
</html>