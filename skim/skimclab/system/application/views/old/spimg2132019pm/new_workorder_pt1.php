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
	function showAlert(){
		alert("Company status is not active! New workorder cannot be created!");	
	}
	
	function showAlert2(){
		alert("You are not allowed to created new workorder! Please contact Administrator!");	
	}
</script>
</head>

<body>
<?php 

	$accessibility = $this->session->userdata('emp_accessibility');
	
	
	
?>
<h4><a href="dashboard.php">SPIM (G1G3)</a> <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" /> New Work Order </h4>

<div><a href="javascript:switchsection.sweepToggle('contract')">Contract All</a> | <a href="javascript:switchsection.sweepToggle('expand')">Expand All</a></div>

<h3 id="switchsection1-title" class="handcursor">New Workorder     <img src="<?php echo base_url();?>/images/down_arrow_org.gif" width="13" height="14" /></h3>
<div id="switchsection1" class="switchgroup1"> 

  <form action="<?php echo site_url();?>/contSpimG/newWOSearchCtr" method="POST" name="frmNewWorkOrder" id="frmNewWorkOrder">
    <table width="100%" border="0">	
      <tr>
        <td width="25%">Searchby</td>
        <td>
        	<input type="radio" name="searchby" value="ctr_comp_name" CHECKED/>Company Name
        	<input type="radio" name="searchby" value="ctr_clab_no" />CLAB NO.
        </td>
      </tr>
      <tr>
        <td width="5%">Keyword</td>
        <td width="70%"><input type="text" name="keyword" size="40"/></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2" align="center"><input type="submit" name="btnSearch" value=" Search " /></td>
      </tr>
    </table>
  </form>
  <br />
 
  <?php if(isset($ctrRecord)){
	  		if($ctrRecord->num_rows() > 0){
  ?>
				  <table width="100%" border="0">
				  	<tr>
				  		<th>CLAB No.</th>
				  		<th>Company Name</th>
				  		<th>Status</th>
				  		<th></th>
				  	</tr>
                    
                   
  					
                    	                        
				  	<?php
					if(strpos($accessibility, 'n') == false) echo "USER NOT ALLOWED";
				  	foreach($ctrRecord->result() as $ctr){
					?>
				  	<tr>
				  		<td><?php echo $ctr->ctr_clab_no;?></td>
				  		<td><?php echo $ctr->ctr_comp_name;?></td>
				  		<td><?php echo $ctr->emp_status_desc;?></td>
				  		<td>
                       
                        <?php if(strpos($accessibility, 'n') == true) {?>
                        	<?php if($ctr->ctr_status == 1){ ?>
                        	<a href="<?php echo site_url('');?>/contSpimG/newWorkOrderPt2/<?php echo $ctr->ctr_clab_no;?>">New Workorder</a>
                        	<?php }
							else {
							?>
                            <a href="#" onclick="showAlert();">New Workorder</a>
                            <?php }?>
						<?php }
				  		else {
					  	?>
    					<a href="#" onclick="showAlert2();">New Workorder</a>
                        <?php }?>
                        
							
                            
                            
                        
                        
                        
                        
				  		</td>
				  	</tr>
				  	<?php
				  		} //end foreach
				  	?>
				  </table>
  <?php
		} //end if
		else{
			echo "<font color=\"red\"><h4>No data to display. Please refine your search keyword.</h4></font>";
		}	
	}
  ?>
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
