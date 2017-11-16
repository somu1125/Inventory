<?php

include('stock.php');
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="select.css">
<script>
function send()
{
	var item=document.getElementById("itm").value;
	var typ=document.getElementById("vt").value;
	if(typ==0)
	{
	alert("Please Select Item Type !!!!");
	}
	else
	{
		window.location.href="newadd.php?itm="+item+"&typ="+typ;
	}
}
</script>
</head>
<body>
<div align="center">
<label style="color:#0ac20a ;margin-right:1%; font-size:2em; font-family: Times New Roman, Times, serif;" >Enter Item </label>
<input type="text" required placeholder="name of item" id="itm">
<select id="vt" >
<option value="0">Select Item Type</option>
<option value="electrical">Electrical</option>
<option value="furniture">Furniture</option>
</select>
<input class="mybutton" type="submit" value="Add" onclick='send();' >
</div>
</body>
</html>