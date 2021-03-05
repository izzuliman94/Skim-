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
    
  <script type="text/javascript">
  	function triggerStatusForm(){
		if (document.changeStatusForm.rdchangestatus[0].checked)
		{
		 	document.changeStatusForm.txtapprovedby.disabled = true;
		 	document.changeStatusForm.txtactivateremarks.disabled = true;
		 	document.changeStatusForm.selActiveStatus.disabled = true;
		  
		  	document.changeStatusForm.selInactiveStatus.disabled = false;
			document.changeStatusForm.txtinactivateReason.disabled = false;
			document.changeStatusForm.dtincident.disabled = false;
			
			changeFormElements();
		}
		else{
			document.changeStatusForm.selInactiveStatus.disabled = true;
			document.changeStatusForm.txtinactivateReason.disabled = true;
			document.changeStatusForm.dtincident.disabled = true;
			document.getElementById("area1").style.visibility = "hidden";	
		 	document.getElementById("area2").style.visibility = "hidden";
			
			document.changeStatusForm.txtapprovedby.disabled = false;
		  	document.changeStatusForm.txtactivateremarks.disabled = false;
		  	document.changeStatusForm.selActiveStatus.disabled = false;
		}
  	}
  	
	function closeAndRefresh()
        {
	        window.opener.location.href=window.opener.location.href; // refresh the main page
			window.opener.focus(); // focus on the main page
			window.close(); // close the popup page
        }
	
  	function changeFormElements(){
	  	var statusindex  = document.changeStatusForm.selInactiveStatus.selectedIndex;
	 	var statusvalue = document.changeStatusForm.selInactiveStatus.options[statusindex].value;
	
	 	if(statusvalue == 14 || statusvalue == 15){
		 	document.getElementById("area1").style.visibility = "hidden";	
		 	document.getElementById("area2").style.visibility = "visible";
	 	}
	 	else{
		 	document.getElementById("area1").style.visibility = "visible";	
		 	document.getElementById("area2").style.visibility = "hidden";
	 	}
  	}
  	
  	function prepareForm(){
	  	document.getElementById("area2").style.visibility = "hidden";	
  	}
  </script>
</head>
<body onLoad="prepareForm();">

<h4><a href="dashboard.php">Labour</a> <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" /><a href="registration_pt1.php"> Registration</a> <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" /> Green Card Status </h4>
<div><a href="javascript:switchsection.sweepToggle('contract')">Contract All</a> | <a href="javascript:switchsection.sweepToggle('expand')">Expand All</a></div>

<h3 id="switchsection1-title" class="handcursor">Green Card Status    <img src="<?php echo base_url();?>/images/down_arrow_org.gif" width="13" height="14" /></h3>
<div id="switchsection1" class="switchgroup1"> 
  <form action="<?php echo site_url('contLabour/updateGreenCard');?>" method="POST" name="changeStatusForm" id="changeStatusForm">
  	<table width="100%" border="0">
  		<tr>
 			<th colspan="5" align="LEFT">Labour Details</th>
 		</tr>
 		<tr>
 			<td width="18%">Passport No :</td>
 			<td width="32%"><?php echo $labor->wkr_passno;?></td>
 			<td width="18%">&nbsp;</td>
		  <td width="32%">&nbsp;</td>
	  </tr>
 		<tr>
 			<td>Name :</td>
 			<td><?php echo $labor->wkr_name;?></td>
 			<td>&nbsp;</td>
 			<td>&nbsp;</td>
 		</tr>
 	</table>
  <table width="100%" border="0">  
      <tr>
        <th colspan="4"><div align="left">CIDB Green Card</div></th>
      </tr>
      
      <tr>
        <td ALIGN="LEFT"><label>
          <input type="checkbox" name="chkgc" value="1" <?php if($labor->wkr_greencard == '1') echo "CHECKED"; ?>/>
        </label>
        Green Card Available</td>
      	<td colspan="1" align="LEFT">
      	 <table width="43%" id="area1" >
      	  	<tr>
	      		<td width="40%">Expiry Date :</td>
	      		<td colspan="2">
	      			<input name="dtgcexp" type="text" id="dtgcexp" value="<?php if($labor->wkr_gcdate != '0000-00-00') echo date('d-m-Y', strtotime($labor->wkr_gcdate));?>" size="12" READONLY/>
	      			<input id="button1" name="btnDate1" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtgcexp'), this)" />	      		</td>
	      	</tr>
	     </table></td>
      </tr>
      <tr>
      	<td><label>
          <input type="checkbox" name="biogc" value="1" <?php if($labor->wkr_biogreencard == '1') echo "CHECKED"; ?>/>
        </label>
        Bio Card Available</td>
      	<td colspan="3">&nbsp;</td>
      </tr>
      <tr>
      	<!--td>Key in by</td-->
      	<!--td><input type="text" name="txtkeyinby" value="<?php echo $this->session->userdata('username');?>" READONLY/></td-->
      	<!--td>Key in date</td-->
      	<!--td><input type="text" name="dtkeyin" id="dtkeyin" value="<?php echo date('d-m-Y');?>" READONLY/>      	</td-->
      </tr>
      <tr>
        <td colspan="4" align="CENTER">
        	<input type="hidden" name="wkr_id" value="<?php echo $labor->wkr_id;?>" />
        	<input type="hidden" name="txtwkrpassno" value="<?php echo $labor->wkr_passno;?>" />
        	<input type="submit" name="btnChangeStatus" value=" Update " onclick="return confirm('Are you sure you want to update the status?');"/>
        	<span class="print">
        	<input type="button" name="btnClose" value=" Close " onclick="closeAndRefresh()" />
       	  </span> </td>
      </tr>
    </table>
  </form>
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
