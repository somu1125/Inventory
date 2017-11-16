<?php
include ('db.php');
include('stock.php');
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="select.css">
</head>
<body>
<div>
<select onchange="chng(this.value);">
<option value="nun">SELECT ITEM TYPE</option>
<option value="electrical">ELECTRICAL</option>
<option value="furniture">FURNITURE</option>
</select>
<script>
function chng(value)
{
if(value=="nun")
	{
		alert("You have to select !!! ");
	}
	else
	{
		window.location.href = "getelmnt.php?item="+value;
	}
}

</script>
</div>
</body>
</html>
