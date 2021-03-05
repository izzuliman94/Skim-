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
</head>

<body>
<h4><a href="dashboard.php">Labour</a> <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" />Edit Labour<img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" />Attach Contract</h4>

<h3 id="switchsection1-title" class="handcursor">Attach Contract<img src="<?php echo base_url();?>/images/down_arrow_org.gif" width="13" height="14" /></h3>
<div id="switchsection1" class="switchgroup1"> 
  <form method="POST" action="<?php echo site_url();?>/contLabour/attachContractSubmit" name="uploadForm" id="uploadForm" enctype="multipart/form-data">
  	<table width="80%" border="0">
      	<tr>
      		<td width="15%">Labour Name:</td>
      		<td width="35%"><?php echo $name;?></td>
      		<td width="15%">Passport No.:</td>
      		<td><?php echo $passno;?></td>
      	</tr>
      	<tr>
      		<td>Country:</td>
      		<td><?php echo $country;?></td>
      		<td>Nationality:</td>
      		<td><?php echo $nationality;?></td>
      	</tr>
      	<tr>
      		<td>File Location:</td>
      		<td colspan="3"><input type="file" name="userfile" size="80" /></td>
      	</tr>
      	<tr>
      		<td colspan="4" align="center">
      			<input type="hidden" name="wkr_id" value="<?php echo $wkr_id;?>" />
      			<input type="hidden" name="txtpassno" value="<?php echo $passno;?>" />
      			<input type="submit" name="Upload" value=" Upload " />
      			<input type="button" name="btnDone" value=" Close " onclick="window.close();" />
      		</td>
      	</tr>
    </table>
  </form>
  <p align="center">&nbsp;</p>
  <font color="red"><strong><?php if(isset($successMsg)) echo $successMsg;?></strong></font>
  <table width="80%" border="0">
  	<tr>
  		<th colspan="5">Upload Contract History</th>
  	</tr>
  	<tr>
  		<th>File Type</th>
  		<th>Destination File Name</th>
  		<th>Upload by</th>
  		<th>Date Upload</th>
  		<th>Delete</th>
  	</tr>
  	<?php if(!isset($uploadContractHistory) || $uploadContractHistory->num_rows == 0){
	?>
	<tr>
		<td colspan="5"><font color="red">No contract has been uploaded.</font></td>
	</tr>
	<?php }
	else{
		foreach($uploadContractHistory->result() as $upload){
	?>
	<tr>
		<td><?php 
				echo anchor_popup(base_url() . $upload->upload_filepath, $upload->upload_filetype);
		 	?></td>
		<td><?php echo $upload->upload_destfilename;?></td>
		<td><?php echo $upload->emp_name;?></td>
		<td><?php if($upload->upload_date != '0000-00-00') echo date('d-m-Y', strtotime($upload->upload_date));?></td>
		<form name="deleteform" method="POST" action="<?php echo site_url();?>/contLabour/deleteUploadedFile/<?php echo $upload->upload_id . "/" . $upload->upload_wkrid;?>">
		<td align="CENTER">
				<input type="image" name="delete" src="<?php echo base_url();?>/images/delete.gif" border="0" onclick="return confirm('Are you sure you want to delete this file?');"  alt="Delete File" <?php if(strlen(strpos($accessibility, '9')) < 1) echo "DISABLED";?> />
		</td>
		</form>
	</tr>
	<?php }
		}
	?>
  </table>
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
