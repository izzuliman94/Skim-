<?php
$is_already_exists = false;
if (isset($_POST["isPostBack"]))
{
	if ($_POST["userEvent"] == "btnUpdate_onclick")
	{
		$sql = "
			UPDATE mst_countries
			SET cty_desc = "._sql_escaped_string($_POST["txtCountryName"], $c)."
			WHERE cty_id = '"._sql_escaped_string($_GET["cty_id"], $c)."'
		";
		_sql_query($sql, $c);
	}
	if ($_POST["userEvent"] == "btnDelete_onclick")
	{
		$sql = "
			DELETE FROM mst_countries 
			WHERE cty_id = '"._sql_escaped_string($_GET["cty_id"], $c)."'
		";
		_sql_query($sql, $c);
	}
	if ($_POST["userEvent"] == "btnSave_onclick")
	{
		$sql = "
			SELECT COUNT(*)
			FROM mst_countries
			WHERE cty_id = '"._sql_escaped_string($_POST["txtCountryID"], $c)."'
		";
		$rs =& _sql_query($sql, $c);
		$r = _sql_fetch_array($rs);
		$count = $r[0];
		_sql_free_result($rs);
		if ($count == 0)
		{
			$sql = "
				INSERT INTO mst_countries
				(cty_id, cty_desc)
				VALUES
				('"._sql_escaped_string($_POST["txtCountryID"], $c)."', ".$_POST["txtCountryName"].")
			";
			_sql_query($sql, $c);
		}
		else
		{
			$is_already_exists = true;
		}
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>mst_countries</title>
<link href="<?php echo base_url();?>css/screen.css" media="screen" rel="stylesheet" type="text/css" />
<script type="text/javascript">
<!--
var yPosition;
function captureYPosition()
{
	if (document.all)
	{
		if (!document.documentElement.scrollTop)
		{
			yPosition = document.body.scrollTop;
		}
		else
		{
			yPosition = document.documentElement.scrollTop;
		}
	}   
	else
	{
		yPosition = window.pageYOffset;
	}
}
function doEdit(index)
{
	var uri = "mst_countries.php";
	uri += "?index=" + String(index);
	uri += "&y_position=" + String(yPosition);
	document.forms[0].userEvent.value = "btnEdit_onclick";
	document.forms[0].action = uri;
	return true;
}
function doDelete(aircraftTypeCode)
{
	if (window.parent.confirm("Delete Aircraft Type '" + aircraftTypeCode + "'?"))
	{
		var uri = "mst_countries.php";
		uri += "?cty_id=" + encodeURIComponent(aircraftTypeCode);
		uri += "&y_position=" + String(yPosition);
		document.forms[0].userEvent.value = "btnDelete_onclick";
		document.forms[0].action = uri;
		return true;
	}
	else
	{
		return false;
	}
}
function doUpdate(aircraftTypeCode)
{
	var isOK = true;
	document.forms[0].txtCountryName.value = document.forms[0].txtCountryName.value.replace(/^\s+/, "").replace(/\s+$/, "");
	if (document.forms[0].txtCountryName.value.length == 0)
	{
		alert("Please enter Cargo Capacity");
		document.forms[0].txtCountryName.focus();
		isOK = false;
	}
	if (isOK && !/^\d+$/.test(document.forms[0].txtCountryName.value))
	{
		alert("Please enter valid Cargo Capacity");
		document.forms[0].txtCountryName.focus();
		isOK = false;
	}
	if (isOK)
	{
		var uri = "mst_countries.php";
		uri += "?cty_id=" + encodeURIComponent(aircraftTypeCode);
		uri += "&y_position=" + String(yPosition);
		document.forms[0].userEvent.value = "btnUpdate_onclick";
		document.forms[0].action = uri;
		return true;
	}
	else
	{
		return false;
	}
}
function doCancelUpdate()
{
	if (window.parent.confirm("Cancel edit?"))
	{
		var uri = "mst_countries.php";
		uri += "?y_position=" + String(yPosition);
		document.forms[0].userEvent.value = "btnCancelUpdate_onclick";
		document.forms[0].action = uri;
		return true;
	}
	else
	{
		return false;
	}
}
function doSave()
{
	document.forms[0].txtCountryID.value = document.forms[0].txtCountryID.value.replace(/^\s+/, "").replace(/\s+$/, "");
	document.forms[0].txtCountryName.value = document.forms[0].txtCountryName.value.replace(/^\s+/, "").replace(/\s+$/, "");
	var isOK = true;
	if (document.forms[0].txtCountryID.value.length == 0)
	{
		alert("Please enter Country Code");
		document.forms[0].txtCountryID.focus();
		isOK = false;
	}
	if (isOK && document.forms[0].txtCountryName.value.length == 0)
	{
		alert("Please enter Country Name");
		document.forms[0].txtCountryName.focus();
		isOK = false;
	}
	if (isOK)
	{
		var uri = "mst_countries.php";
		document.forms[0].userEvent.value = "btnSave_onclick";
		document.forms[0].action = uri;
		return true;
	}
	else
	{
		return false;
	}
}
//-->
</script>
</head>
<body>
<form name="form1" action="countries.php" method="POST">
<table border="0" cellpadding="4" cellspacing="1" style="background-color: #eeeeee; width: 100%">
	<tr class="header2" style="background-color: #ffffff; text-align: center">
		<th>Country Code</th>
		<th>Country Name</th>
		<th>(Action)</th>
	</tr>
<?php
$sql = "
	SELECT cty_id, cty_desc
	FROM mst_countries
	ORDER BY cty_id
";
$rs = $this->db->query($sql);
$i = 0;
foreach($rs->result() as $r)
{
	$cty_id = is_null($r->cty_id) ? "" : (string)$r->cty_id;
	$cty_desc = is_null($r->cty_desc) ? "" : (string)$r->cty_desc;
?>
	<tr style="background-color: #ffffff">
		<td style="text-align: center">
			<?php echo $cty_id; ?>
		</td>
		<td style="<?php echo (isset($_POST["isPostBack"]) && $_POST["userEvent"] == "btnEdit_onclick" && (int)$_GET["index"] == $i) ? "text-align: center" : "text-align: right"; ?>">
<?php
	if (isset($_POST["isPostBack"]) && $_POST["userEvent"] == "btnEdit_onclick" && (int)$_GET["index"] == $i)
	{
?>
			<input id="txtCountryName" name="txtCountryName" type="text" class="smoottext2" style="width: 95%" value="<?php echo str_replace(",", "", $cty_desc); ?>" />
<?php
	}
	else
	{
?>
			<?php echo $cty_desc; ?>
<?php
	}
?>
		</td>
		<td style="text-align: center">
<?php
	if (isset($_POST["isPostBack"]) && $_POST["userEvent"] == "btnEdit_onclick" && (int)$_GET["index"] == $i)
	{
?>
			<input id="btnUpdate<?php echo (string)$i; ?>" name="btnUpdate<?php echo (string)$i; ?>" onclick="captureYPosition();return doUpdate('<?php echo $cty_id; ?>')" type="image" src="<?php echo base_url();?>images/diskette.gif" title="Save" />
			<input id="btnCancelUpdate<?php echo (string)$i; ?>" name="btnCancelUpdate<?php echo (string)$i; ?>" onclick="captureYPosition();return doCancelUpdate()" type="image" src="<?php echo base_url();?>images/cancel_edit.png" title="Cancel edit" />
<?php
	}
	else
	{
?>
			<input id="btnEdit<?php echo (string)$i; ?>" name="btnEdit<?php echo (string)$i; ?>" onclick="captureYPosition();return doEdit(<?php echo (string)$i; ?>)" type="image" src="../../images/txt-edit.jpg" title="Edit" />
			<input id="btnDelete<?php echo (string)$i; ?>" name="btnDelete<?php echo (string)$i; ?>" onclick="captureYPosition();return doDelete('<?php echo $cty_id; ?>')" type="image" src="../../images/delete.gif" title="Delete" />
<?php
	}
?>
		</td>
	</tr>
<?php
	$i++;
}

if (!isset($_POST["isPostBack"]) || (isset($_POST["isPostBack"]) && $_POST["userEvent"] != "btnEdit_onclick"))
{
?>
	<tr style="background-color: #ffffff">
		<td style="text-align: center">
			<input id="txtCountryID" name="txtCountryID" type="text" class="smoottext2" style="width: 95%" />
		</td>
		<td style="text-align: center">
			<input id="txtCountryName" name="txtCountryName" type="text" class="smoottext2" style="width: 95%" />
		</td>
		<td style="text-align: center">
			<input id="btnSave" name="btnSave" onclick="return doSave()" type="image" src="../../images/diskette.gif" title="Save" />
		</td>
	</tr>
<?php
}
?>
</table>
<input id="isPostBack" name="isPostBack" type="hidden" />
<input id="userEvent" name="userEvent" type="hidden" />
</form>
<script type="text/javascript">
<!--
parent.document.getElementById("ifrBlank").src = "../../blank.html"
<?php
if (isset($_GET["y_position"]))
{
	echo "window.scrollTo(0, ".$_GET["y_position"].");\n";
}
if ($is_already_exists)
{
	echo "parent.alert(\"Aircraft Type '".$_POST["txtCountryID"]."' already exists\");\n";
}
?>
//-->
</script>
</body>
</html>