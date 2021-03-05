<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta SKIM-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM</title>
<link href="<?php echo base_url()?>css/sippsstyle.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="<?php echo base_url()?>js/switchcontent.js" >

/***********************************************
* Switch Content script- © Dynamic Drive (www.dynamicdrive.com)
* This notice must stay intact for legal use. Last updated April 05th, 2007.
* Visit http://www.dynamicdrive.com/ for full source code
***********************************************/

</script>
<?php if(isset($extra_head)) echo $extra_head; ?>
</head>

<body>

<h4> System administration  <img src="<?php echo base_url()?>images/right_arrow.gif" width="13" height="14" /> Facilities List </h4>

<h2>Facilities List </h2>

<div><a href="javascript:adminlistentities.sweepToggle('contract')">Contract All</a> | <a href="javascript:adminlistentities.sweepToggle('expand')">Expand All</a></div>

<h3 id="adminlistentities1-title" class="handcursor">Search <img src="<?php echo base_url()?>images/down_arrow_org.gif" width="13" height="14" /></h3>
<div id="adminlistentities1" class="switchgroup1">
<?php if($item != ""){
		if($item != "gfid")
			echo "<h4><font color='#FF0000'>The $item has been successfully $action!</font></h4>";
	  }
?>
<?php echo $crud; ?>
</div>
<script type="text/javascript">
	//   MAIN FUNCTION: new switchcontent("class name", "[optional_element_type_to_scan_for]") REQUIRED
	//1) Instance.setStatus(openHTML, closedHTML)- Sets optional HTML to prefix the headers to indicate open/closed states
	//2) Instance.setColor(openheaderColor, closedheaderColor)- Sets optional color of header when it's open/closed
	//3) Instance.setPersist(true/false)- Enables or disabled session only persistence (recall contents' expand/contract states)
	//4) Instance.collapsePrevious(true/false)- Sets whether previous content should be contracted when current one is expanded
	//5) Instance.defaultExpanded(indices)- Sets contents that should be expanded by default (ie: 0, 1). Persistence feature overrides this setting!
	//6) Instance.init() REQUIRED

	var adminlistentities=new switchcontent("switchgroup1", "div") //Limit scanning of switch contents to just "div" elements
	//bobexample.setStatus('<img src="http://img242.imageshack.us/img242/5553/opencq8.png" /> ', '<img src="http://img167.imageshack.us/img167/7718/closedy2.png" /> ')
	adminlistentities.setColor('darkred', 'black')
	adminlistentities.setPersist(true)
	adminlistentities.collapsePrevious(true) //Only one content open at any given time
	adminlistentities.init()
</script>
</body>
</html>
