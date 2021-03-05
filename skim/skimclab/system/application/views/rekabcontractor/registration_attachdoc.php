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
<h4><a href="dashboard.php">Contractors</a> <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" /> Attach Doc</h4>

<h3 id="switchsection1-title" class="handcursor">Attach Files<img src="<?php echo base_url();?>/images/down_arrow_org.gif" width="13" height="14" /></h3>
<div id="switchsection1" class="switchgroup1"> 
  <strong><?php echo "Contractor Name: " . $ctr_compname;?>
  <br />
  <?php echo "CLAB No.: " . $clabno;?></strong>
  
  <form action="<?php echo site_url();?>/contContractor/uploadDocSubmit" method="POST" name="uploadForm" id="uploadForm"  enctype="multipart/form-data">
  	<table width="80%" border="0">
      	<tr>
      		<td>File Type:</td>
    		<td><input type="radio" name="filetype" value="form24" CHECKED/>Form 24
    			<input type="radio" name="filetype" value="form49" />Form 49
    			<input type="radio" name="filetype" value="formD" />Form D
                <input type="radio" name="filetype" value="copyofCIDBcert" />Copy of CIDB certificate 
    			<input type="radio" name="filetype" value="iccopy" />IC Copy 
    			<input type="radio" name="filetype" value="agreement" />
    			Suplier Agreement
    			<br />
    			<input type="radio" name="filetype" value="others" />Others
    			<input type="text" name="otherFileName" size="40" value=""/>
    			<input type="hidden" name="clabno" value="<?php echo $clabno;?>" />
    			<input type="hidden" name="ctr_compname" value="<?php echo $ctr_compname;?>" />
    		</td>
      	</tr>
      	<tr>
      		<td>Location :</td>
      		<td><input type="file" name="userfile" size="80" /></td>
      	</tr>
      	<tr>
      		<td colspan="2" align="center">
      			<input type="submit" name="Upload" value=" Upload " />
      			<input type="button" name="btnDone" value=" Close " onclick="window.close();" />
      		</td>
      	</tr>
    </table>
  </form>
  <br />
  <?php if(isset($successMsg)) echo "<strong><font color=\"red\">$successMsg</font></strong>";?>
  <table width="80%" border="0">
  	<tr>
  		<th colspan="6" align="CENTER">Upload History</th>
  	</tr>
  	<tr>
  		<th width="5%">No.</th>
  		<th width="20%">File Type</th>
  		<th width="35%">Destination Filename</th>
  		<th width="20%">Uploaded by</th>
  		<th width="15%">Date Upload</th>
  		<th width="5%">Delete</th>
  	</tr>
  	<?php if($uploadHistory->num_rows() == 0){
	?>
  	<tr>
  		<td colspan="6"><font color="red">No files uploaded yet.</font></td>
  	</tr>
  	<?php }
  	else{
	  	$i = 1;
	  	foreach($uploadHistory->result() as $upload){
	?>
  	<tr>
  		<td><?php echo $i++;?>.</td>
  		<td><?php echo $upload->att_filetype;?></td>
  		<td>
  			<?php 
				echo anchor_popup(base_url() . $upload->att_desturl, $upload->att_dest_filename);
		 	?>
		</td>
  		<td><?php echo $upload->emp_username;?></td>
  		<td><?php echo date('d-m-Y', strtotime($upload->att_uploaddate));?></td>
  		<form name="deleteform" method="POST" action="<?php echo site_url();?>/contContractor/deleteUploadedFile/<?php echo $upload->att_id . "/" . $upload->att_ctr_id;?>">
		<td align="CENTER">
				<input type="image" name="delete" src="<?php echo base_url();?>/images/delete.gif" border="0" onclick="return confirm('Are you sure you want to delete this file?');"  alt="Delete File" <?php if(strlen(strpos($accessibility, '9')) < 1) echo "DISABLED";?> />
		</td>
		</form>
  	</tr>
  	<?php }
	}
	?>
  </table>
  <p align="center">&nbsp;</p>
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
