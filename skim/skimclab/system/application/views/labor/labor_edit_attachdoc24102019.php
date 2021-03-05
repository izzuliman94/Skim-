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
<script type="text/javascript">
	function prepareForm(){
	  	document.getElementById("areaoth1").style.visibility = "hidden";	
	  	document.getElementById("areadoc1").style.visibility = "hidden";	
	  	
	  	document.getElementById("areaoth2").style.visibility = "hidden";	
	  	document.getElementById("areadoc2").style.visibility = "hidden";	
	  	
	  	document.getElementById("areaoth3").style.visibility = "hidden";	
	  	document.getElementById("areadoc3").style.visibility = "hidden";	
	  	
	  	document.getElementById("areaoth4").style.visibility = "hidden";	
	  	document.getElementById("areadoc4").style.visibility = "hidden";	
	  	
	  	document.getElementById("areaoth5").style.visibility = "hidden";	
	  	document.getElementById("areadoc5").style.visibility = "hidden";	
  	}
  	function resetAll(){
	  	document.uploadForm.reset();
  	}
  	<?php 
  	for($i=1;$i<=5;$i++){
	?>
		function changeFormElements<?php echo $i;?>(){
			var doctypeindex  = document.uploadForm.seldoctype<?php echo $i;?>.selectedIndex;
		
		 	if(doctypeindex == 8){
			 	document.getElementById("areadoc<?php echo $i;?>").style.visibility = "hidden";	
			 	document.getElementById("areaoth<?php echo $i;?>").style.visibility = "visible";	
		 	}
		 	else if(doctypeindex == 2 || doctypeindex == 6){
			 	document.getElementById("areadoc<?php echo $i;?>").style.visibility = "visible";	
			 	document.getElementById("areaoth<?php echo $i;?>").style.visibility = "hidden";
		 	}
		 	else{
			 	document.getElementById("areadoc<?php echo $i;?>").style.visibility = "hidden";	
			 	document.getElementById("areaoth<?php echo $i;?>").style.visibility = "hidden";
		 	}
	  	}
	  	
	<?php }
	?>
</script>
</head>

<body onLoad="prepareForm();">
<h4><a href="dashboard.php">Labour</a> <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" />Edit Labour<img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" />Attach Doc</h4>

<h3 id="switchsection1-title" class="handcursor">Attach Multiple Files<img src="<?php echo base_url();?>/images/down_arrow_org.gif" width="13" height="14" /></h3>
<div id="switchsection1" class="switchgroup1"> 
  <form method="POST" action="<?php echo site_url();?>/contLabour/attachMultipleDocSubmit" name="uploadForm" id="uploadForm" enctype="multipart/form-data">
  	<strong>Labour Name: <?php echo $name;?> &nbsp; &nbsp; &nbsp; Passport No.: <?php echo $passno;?> &nbsp; &nbsp; Country: <?php echo $country;?></strong>
    <br />
    <table width="100%" border="0">
      	<tr>
      		<th>No.</th>
      		<th>Document Type</th>
      		<th>File Location</th>
      		<th>File No.(if applicable)</th>
      		<th>Specify Others(if applicable)</th>
      	</tr>
      	<?php
      		for($i=1;$i<6;$i++){
	    ?>
	      	<tr>
	      		<td>File <?php echo $i;?></td>
	      		<td>
	      			<SELECT name="seldoctype<?php echo $i;?>" onchange="changeFormElements<?php echo $i;?>();">
	      				<option value="Photo" SELECTED>Photo</option>
	      				<option value="Passport">Passport</option>
	      				<option value="PLKS">Permit(PLKS)</option>
	      				<option value="Address">Address</option>
	      				<option value="EntryDate">Entry Date (Chop Masuk)</option>
	      				<option value="COM">Check-out Memo(COM)</option>
	      				<option value="SpecialPass">Special Pass</option>
	      				<option value="CERTIFICATE">Cert</option>
	      				<option value="Others">Others</option>
	      			</SELECT> 
	      		</td>
	      		<td><input type="file" name="userdoc[]" id="userdoc[]" size="50" />
	      		</td>
	      		<td align="CENTER">
	      			<div id="areadoc<?php echo $i;?>">
	      					<SELECT name="documentno<?php echo $i;?>">
	      						<option value="1" SELECTED>1</option>
	      						<option value="2">2</option>
	      						<option value="3">3</option>
	      						<option value="4">4</option>
	      						<option value="5">5</option>
	      						<option value="6">6</option>
	      						<option value="7">7</option>
	      						<option value="8">8</option>
								<option value="9">9</option>
	      						<option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
								<option value="13">13</option>
	      					</SELECT>			
	      			</div>
	      		</td>
	      		<td  align="CENTER">
	      			<div id="areaoth<?php echo $i;?>">
	      			<input type="text" name="txtdoctype<?php echo $i;?>" size="30" /></div>
	      		</td>
	      	</tr>
		<?php }
		?>      	
      	<tr>
      		<td colspan="5" align="center">
      			<input type="hidden" name="wkr_id" value="<?php echo $wkr_id;?>" />
      			<input type="hidden" name="txtpassno" value="<?php echo $passno;?>" />
      			<input type="submit" name="Upload" value=" Upload " />
      			<input type="button" name="btnclear<?php echo $i;?>" value="Reset All" onclick='javascript:resetAll();'/>
      			<input type="button" name="btnDone" value=" Close " onclick="window.close();" />
      		</td>
      	</tr>
    </table>
</form>
  <p align="center">&nbsp;</p>
  <font color="red"><strong><?php if(isset($successMsg)) echo $successMsg;?></strong></font>
  <table width="80%" border="0">
  	<tr>
  		<th colspan="7">Upload Documents History</th>
  	</tr>
  	<tr>
  		<th>No.</th>
  		<th>File Type</th>
  		<th>Destination File Name</th>
  		<th>Upload by</th>
  		<th>Date Upload</th>
  		<th>Print Option</th>
  		<th>Delete</th>
  	</tr>
  	<?php if(!isset($uploadDocHistory) || $uploadDocHistory->num_rows == 0){
	?>
	<tr>
		<td colspan="7"><font color="red">No document has been uploaded.</font></td>
	</tr>
	<?php }
	else{
		$i = 1;
		foreach($uploadDocHistory->result() as $upload){
	?>
	<tr>
		<td><?php echo $i++;?></td>
		<td>
			<?php 
				echo anchor_popup(base_url() . $upload->upload_filepath, $upload->upload_filetype);
		 	?>
		</td>
		<td><?php echo $upload->upload_destfilename;?></td>
		<td><?php echo $upload->emp_name;?></td>
		<td><?php if($upload->upload_date != '0000-00-00') echo date('d-m-Y', strtotime($upload->upload_date));?></td>
		<td align="CENTER">
			<?php 
			if(substr($upload->upload_filetype, 0, 4) == 'PLKS'){
				echo anchor_popup("contLabour/printAttachPermit/PLKS/" . $wkr_id, " Print all Permit");
			}
			else if(substr($upload->upload_filetype, 0, 11) == 'SpecialPass'){
				echo anchor_popup("contLabour/printAttachPermit/SpecialPass/" . $wkr_id, "Print all SpecialPass");
			}
			else{
			 	echo " - ";
		 	}
		 	?>
		</td>
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
  <br />
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
