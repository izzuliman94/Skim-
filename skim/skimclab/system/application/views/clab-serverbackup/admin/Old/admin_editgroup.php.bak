<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM</title>
<link href="<?php echo base_url()?>css/sippsstyle.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="<?php echo base_url()?>js/switchcontent.js" >

/***********************************************
* Switch Content script- © Dynamic Drive (www.dynamicdrive.com)
* This notice must stay intact for legal use. Last updated April 05th, 2007.
* Visit http://www.dynamicdrive.com/ for full source code
***********************************************/

</script>
</head>

<body>

<h4> <a href="<?php echo site_url('contSystemAdmin/filterListUsers');?>">System administration</a>  <img src="<?php echo base_url()?>images/right_arrow.gif" width="13" height="14" /> <a href="<?php echo site_url('contSystemAdmin/filterListGroups');?>">Groups List</a><img src="<?php echo base_url()?>images/right_arrow.gif" width="13" height="14" />Edit Group</h4>

<h2> Edit Group </h2>

<div><a href="javascript:admindashbrd.sweepToggle('contract')">Contract All</a> | <a href="javascript:admindashbrd.sweepToggle('expand')">Expand All</a></div>

<h3 id="admindashbrd2-title" class="handcursor">Group Information  <img src="<?php echo base_url()?>images/down_arrow_org.gif" width="13" height="14" /></h3>
<div id="admindashbrd2" class="switchgroup1">
<form action="<?php echo site_url('contSystemAdmin/editGroupSubmit');?>" method="post" name="user_information" id="user_information">
    <table width="100%" border="0">
      <tr>
        <td><input name="group_id" type="hidden" value="<?php echo $groupinfo->group_id;?>" />
        Name</td>
        <td>:</td>
        <td><input name="group_name" type="text" size="50" maxlength="100" value="<?php echo $groupinfo->group_name;?>" /></td>
      </tr>
      <tr>
        <td>Description</td>
        <td>:</td>
        <td><input name="group_desc" type="text" size="130" maxlength="150" value="<?php echo $groupinfo->group_desc;?>"/></td>
      </tr>
      <tr>
        <td>Default Page </td>
        <td>:</td>
        <td><select name="group_defaultpage">
            	<option value="contCallDashboard" <?php if($groupinfo->group_defaultpage == 'contCallDashboard') echo "SELECTED";?>>Call Dashboard</option>
            	<option value="contClinic/clinicDashbrdEntityBased" <?php if($groupinfo->group_defaultpage == 'contClinic') echo "SELECTED";?>>Clinic Module</option>
            	<option value="contLab" <?php if($groupinfo->group_defaultpage == 'contLab') echo "SELECTED";?>>Lab Module</option>
            	<option value="contSystemAdmin/sysAdminDashbrd" <?php if($groupinfo->group_defaultpage == 'contSystemAdmin/sysAdminDashbrd') echo "SELECTED";?>>System Admin Dashboard</option>
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
        <td colspan="3"><input type="checkbox" name="sitemaps[]" value="<?php echo $row->sitemap_name;?>" <?php foreach($groupsitemaps->result() as $mySitemap){if($mySitemap->groupsitemap_sitemap_name == $row->sitemap_name) echo "checked";}?>> &nbsp; <?php echo $row->sitemap_name;?></td>
      </tr>
      <?php endforeach; ?>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><label>
          <input type="submit" name="btnUserSave" value=" Update " /> &nbsp; &nbsp;
	</form>
        </label>
          <input type="button" name="btnCancel" value=" Cancel " onclick="history.back()" />
        </td>
      </tr>
    </table>

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


</body>
</html>