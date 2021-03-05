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
</head>

<body>

<h4> System administration  <img src="<?php echo base_url() ?>images/right_arrow.gif" width="13" height="14" /> Import JPN data </h4>

<h2>Import data</h2>

<div><a href="javascript:adminlistusers.sweepToggle('contract')">Contract All</a> | <a href="javascript:adminlistusers.sweepToggle('expand')">Expand All</a></div>

<h3 id="adminlistusers1-title" class="handcursor">Import <img src="<?php echo base_url() ?>images/down_arrow_org.gif" width="13" height="14" /></h3>
<div id="adminlistusers1" class="switchgroup1">

<h3><?php if(isset($error)) echo $error; ?></h3>
<p>Upload a text file (*.txt) to import clients data. <br />Maximum allowed file size: 3 MB.</p>
<form method="post" action="<?php echo site_url('contImport/do_upload');?>" enctype="multipart/form-data" />
	<table width="100%" border="0">
		<tr>
			<td width="20%">Data Source : </td>
			<td width="80%">
				<select name="datasource">
					<option value="JPN">JPN</option>
					<option value="TPC">TPC</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>File :</td>
			<td>
				<input type="file" name="userfile" size="100" />
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input type="submit" value="    Upload    " /></td>
		</tr>
	</table>
</form>
</div>
<h3 id="switchsection3-title" class="handcursor">Previous Data Import Log<img src="<?php echo base_url()?>images/down_arrow_org.gif" width="13" height="14" /></h3>
  <div id="switchsection3" class="switchgroup1">
  		<?php $i=0;
  			  if(isset($importLogs)){
  		?>
  			<table width="100%" border="0">
	  				<tr>
	  					<th width="5%">No.</td>
	  					<th width="15%">Imported by</td>
	  					<th width="15%%">Timestamp</td>
	  					<th width="65%">Summary</td>
	  				</tr>
  		<?php
  				if($importLogs->num_rows() >0){
  			  		foreach($importLogs->result() as $row){	?>
	  				<tr>
	  					<td><?php echo ++$i; ?></td>
	  					<td><?php echo $row->user_name; ?></td>
	  					<td><?php echo $row->log_datetime; ?></td>
	  					<td><?php echo $row->log_action?> </td>
	  				</tr>
  		<?php	} //endforeach
  		 	} else{
  		 ?>
  		 		<tr>
  		 			<td colspan="4">There is no previous import log.</td>
  		 		</tr>
  		 </table>
  		 <?php
  		 	}//endelse
  		}//endif ?>
   </div>

<script type="text/javascript">
//   MAIN FUNCTION: new switchcontent("class name", "[optional_element_type_to_scan_for]") REQUIRED
//1) Instance.setStatus(openHTML, closedHTML)- Sets optional HTML to prefix the headers to indicate open/closed states
//2) Instance.setColor(openheaderColor, closedheaderColor)- Sets optional color of header when it's open/closed
//3) Instance.setPersist(true/false)- Enables or disabled session only persistence (recall contents' expand/contract states)
//4) Instance.collapsePrevious(true/false)- Sets whether previous content should be contracted when current one is expanded
//5) Instance.defaultExpanded(indices)- Sets contents that should be expanded by default (ie: 0, 1). Persistence feature overrides this setting!
//6) Instance.init() REQUIRED

var adminlistusers=new switchcontent("switchgroup1", "div") //Limit scanning of switch contents to just "div" elements
//bobexample.setStatus('<img src="http://img242.imageshack.us/img242/5553/opencq8.png" /> ', '<img src="http://img167.imageshack.us/img167/7718/closedy2.png" /> ')
adminlistusers.setColor('darkred', 'black')
adminlistusers.setPersist(true)
adminlistusers.collapsePrevious(true) //Only one content open at any given time
adminlistusers.init()
</script>
</body>
</html>