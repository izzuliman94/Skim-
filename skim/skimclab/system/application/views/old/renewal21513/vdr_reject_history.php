<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM - VDR Reject History</title>
<link href="<?php echo base_url();?>/css/sippsstyle.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="<?php echo base_url();?>/js/switchcontent.js" >

/***********************************************
* Switch Content script- © Dynamic Drive (www.dynamicdrive.com)
* This notice must stay intact for legal use. Last updated April 05th, 2007.
* Visit http://www.dynamicdrive.com/ for full source code
***********************************************/

</script>
<script language="JavaScript" src="<?php echo base_url()?>js/validator.js"></script>
<script type="text/javascript">
		//to refresh the main page when close button is hit
        function closeAndRefresh()
        {
	        window.opener.location.href=window.opener.location.href; // refresh the main page
			window.opener.focus(); // focus on the main page
			window.close(); // close the popup page
        }
</script>
</head>

<body>
<?php 
	$accessibility = $this->session->userdata('emp_accessibility');
?>
<h4><a href="dashboard.php">SPIM</a> <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" /> Update Work Order <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" /> View Reject History</h4> 

<h3 id="switchsection1-title" class="handcursor">Workorder Reject History <img src="<?php echo base_url();?>/images/down_arrow_org.gif" width="13" height="14" /></h3>
<table width="100%" border="0">
	<form method="POST" action="<?php echo site_url();?>/contRenewal/updateRejectHistory" name="frmRejectHistory" id="frmRejectHistory" onsubmit="return v.exec();">
	<tr>
		<th colspan="2" align="center">Workorder details</th>
	</tr>
	<tr>
		<td>Workorder ID</td>
		<td><?php echo $wo_id;?></td>
	</tr>
	<tr>
		<td>Contractor Name:</td>
		<td><input type="text" name="txtctrname" value="<?php echo $ctr_comp_name;?>" READONLY /></td>
	</tr>
	<tr>
		<td>Clab No.</td>
		<td><input type="text" name="txtclabno" value="<?php echo $clab_no;?>" READONLY /></td>
	</tr>
	<tr>
		<th colspan="2" align="center">New Reject History</th>
	</tr>
	<tr>
		<td id="t_txtapplied">Total applied:</td>
		<td><input type="text" name="txtapplied" id="txtapplied"/></td>
	</tr>
	<tr>
		<td id="t_txtapproved">Approved</td>
		<td><input type="text" name="txtapproved" id="txtapproved"/></td>
	</tr>
	<tr>
		<td id="t_txtrejected">Rejected:</td>
		<td><input type="text" name="txtrejected" id="txtrejected"/></td>
	</tr>
	<tr>
		<td id="t_txtcomment">Comment</td>
		<td><textarea name="txtcomment" id="txtcomment" cols="30" rows="2"></textarea></td>
	</tr>
	<tr>
		<td colspan="2" align="CENTER">
			<input type="hidden" name="txtclabno" value="<?php echo $clab_no;?>" />
			<input type="hidden" name="txtwoid" value="<?php echo $wo_id;?>" />
			<input type="submit" name="btnSubmit" value=" Add " onclick="return confirm('Are you sure you want to save?');" <?php if(strpos($accessibility, 's') == false) echo "DISABLED";?>/>
			<input type="button" name="btnClose" value="Close" onclick="closeAndRefresh();" />
		</td>
	</tr>
	</form>
</table>
<br />

<table width="100%" border="0">
	<tr>
		<th colspan="6" align="CENTER">Reject History</th>
	</tr>
				  	<tr>
				  		<th rowspan="2" width="5%">No.</th>
				  		<th colspan="3">No of FCL</th>
				  		<th rowspan="2">Comment</th>
				  		<th rowspan="2">Date</th> 
				  	</tr>
				  	<tr>
				  		<th width="8%">Applied</th>
				  		<th width="8%">Apprved</th>
				  		<th width="8%">Rejected</th>
				  	</tr>
 				    <?php if($woRecord->num_rows() > 0){
	 				        $i = 1;
						  	foreach($woRecord->result() as $wo){
					?>
					<tr>
						<td><?php echo $i++; ?> .</td>
						<td><?php echo $wo->reject_apply; ?></td>
						<td><?php echo $wo->reject_approve; ?></td>
						<td><?php echo $wo->reject_rejected; ?></td>
						<td><?php echo $wo->reject_comment; ?></td>
						<td><?php echo date('d-m-Y', strtotime($wo->reject_createddate));?></td>
					</tr>
					<?php
							}
						}
						else{
					?>
					<tr>
						<td colspan="6"><font color="red">There is no previous reject history for this contractor.</font></td>
					</tr>
					<?php
						}
				    ?>
			</table>
			
<!--JAVASCRIPT FOR FORM VALIDATION-->
    <script>
	// form fields description structure
	var a_fields = {
		'txtapplied': {
			'l': 'FCL applied',  // label
			'r': true,    // required
			'f': 'unsigned',
			't': 't_txtapplied'// id of the element to highlight if input not validated
		},
		'txtapproved':{'l':'Total Approved','r':true,'f': 'unsigned','t':'t_txtapproved'},
		'txtrejected':{'l':'Total Rejected','r':true,'f': 'unsigned','t':'t_txtrejected'},
		'txtcomment':{'l':'Comment','r':true,'t':'t_txtcomment'}
	},

	o_config = {
		'to_disable' : ['Submit', 'Reset'],
		'alert' : 1
	}

	// validator constructor call
	var v = new validator('frmRejectHistory', a_fields, o_config);

	</script>
    <!--END OF FORM VALIDATION JAVASCRIPT-->
</body>
</html>
