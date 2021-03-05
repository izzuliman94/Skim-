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
<script language="JavaScript" src="<?php echo base_url()?>js/validator.js"></script>
</head>

<body>

<h4> <a href="admin_dashbrd.php">System administration</a>  <img src="<?php echo base_url()?>images/right_arrow.gif" width="13" height="14" /> Add User </h4>

<h2> Add Login </h2>

<div><a href="javascript:admindashbrd.sweepToggle('contract')">Contract All</a> | <a href="javascript:admindashbrd.sweepToggle('expand')">Expand All</a></div>

<h3 id="admindashbrd2-title" class="handcursor">Login Information  <img src="<?php echo base_url()?>images/down_arrow_org.gif" width="13" height="14" /></h3>
<div id="admindashbrd2" class="switchgroup1">
<?php if(isset($error)) echo $error; ?>
  <form id="" name="login_info" method="POST" action="<?php echo site_url('contSystemAdmin/addLogin');?>" onsubmit="return v.exec()">
    <table width="100%" border="0">
	<tr>
	<td>Select User </td>
        <td>:</td>
        <td>
        <label>
          <select name="user_id" width="30">
          <?php foreach($users->result() as $userrow): ?>
            <option value="<?php echo $userrow->user_id; ?>"><?php echo $userrow->user_name; ?></option>
          <?php endforeach; ?>
          </select>
          <a href="<?php echo site_url()?>/contSystemAdmin/newUser">Add New User</a> </label></td>

	</tr>
      <tr>
        <td width="13%" id="t_name">Login Name</td>
        <td width="1%">:</td>
        <td width="86%"><input name="login_name" type="text" size="30" maxlength="15" /></td>
      </tr>
      <tr>
        <td id="t_pwd">Login Password </td>
        <td>:</td>
        <td><input name="login_pass" type="password" size="30" maxlength="15" /></td>
      </tr>
      <tr>
        <td>Group</td>
        <td>:</td>
        <td><label>
          <select name="login_group_id">
          <?php foreach ($groups->result() as $row): ?>
            <option value="<?php echo $row->group_id;?>"><?php echo $row->group_name;?></option>
          <?php endforeach; ?>
          </select>
          <a href="<?php echo site_url()?>/contSystemAdmin/newGroup">Add Group</a> </label></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
 </table>
 <table width="100%" border="0">
      <tr>
      	<th colspan="2" id="t_entity">Select Facilities:</th>
      </tr>
      <tr>
      	<td width="50%"><h3>KLANG</h3></td>
      	<td width="50%"><h3>MERSING</h3></td>
      </tr>
      <tr>
      	<td>
			<table border="0" width="100%">
      		<?php	$prevEntityType="";
			foreach($entities->result() as $entity){
				$entityType = $entity->entity_type;
			if($entityType != $prevEntityType){
				$prevEntityType = $entityType;
			?>
				<tr>
					<td colspan="3"><?php echo strtoupper($entityType);?></td>
				</tr>
				<?php  }
				if($entity->entity_state == 10){
				?>

				<tr>
					<td colspan="3"><input type="checkbox" name="entitylinks[]" value="<?php echo $entity->entity_id;?>">&nbsp; <?php echo $entity->entity_name;?></td>
				</tr>
			<?php
				}
			}
			?>
      		</table>
		</td>
		<td><table width="100%" border="0">
      			<?php	$prevEntityType="";
				foreach($entities->result() as $entity){
					$entityType = $entity->entity_type;
				if($entityType != $prevEntityType){
					$prevEntityType = $entityType;
				?>
				<tr>
					<td colspan="3"><?php echo strtoupper($entityType);?></td>
				</tr>
				<?php  }
				if($entity->entity_state == 1){
				?>

				<tr>
					<td colspan="3"><input type="checkbox" name="entitylinks[]" value="<?php echo $entity->entity_id;?>">&nbsp; <?php echo $entity->entity_name;?></td>
				</tr>
			<?php
				}
			}
			?>
      		</table>
      	</td>
      </tr>
      <tr>
        <td colspan="2" align="center"><input type="submit" name="btnLoginSave" value="  Save  " />  </td>
      </tr>
    </table>
  </form>
      <!--javascript for form validation-->
    <script>
	// form fields description structure
	var a_fields = {
		'login_name':{'l':'Login name','r':true,'t':'t_name','mn': 4},
		'login_pass':{'l':'Password','r':true,'t':'t_pwd','mn': 4},
		'entitylinks[]':{'l':'Entity Links','r':false,'t':'t_entity'}
	},

	o_config = {
		'to_disable' : ['Submit', 'Reset'],
		'alert' : 1
	}

	// validator constructor call
	var v = new validator('login_info', a_fields, o_config);

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


</body>
</html>
