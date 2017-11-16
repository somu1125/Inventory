
<html>
<head><title>Data View</title>
<link href="layout/styles/main.css" rel="stylesheet" type="text/css" media="all">
<link href="layout/styles/mediaqueries.css" rel="stylesheet" type="text/css" media="all">
<link rel="stylesheet" type="text/css" href="log.css">
<script type="text/javascript" src="jquery-1.7.1.min.js">
</script>
<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: white;
	opacity: 0.8;
}
li {
    float: left;
}

li a {
    display: block;
    color: black;
    text-align: center;
    padding: 16px;
    text-decoration: bold;
	
}

li a:hover {
    background-color: cyan;
	opacity: 1;
	color: black;
	text-decoration: underline ;
}

</style>
</head>
<body>
</head>
<body class="">

<ul>
  <li><a href="index1.php">INDEX</a></li>
  <li><a href="view.php">VIEW</a></li>
  <li><a href="edit.php">EDIT</a></li>
  <li><a href="stock.php">STOCK MANAGEMENT</a></li>
  <li><a href="issue.php">ISSUE</a></li>
  <li><a href='login.php'>LogOut</a></li>
  
</ul>
<div class="viewpage">
<form class="form" method=post action="view.php">

<select id="vt" onchange="slchng(this.value);" >
<option value="slv" selected="selected">Select View</option>
<option value="group">Group View</option>

<option value="rum">Room View</option>
</select>

<select id="lv" style="visibility: hidden" onchange="level(this.value);"></select>
<option value="0">Select</option>
<select id="lr" disabled onchange="datas(this.value);">
<option value="0">Select</option>
</select>
<script>
function slchng(val)
{		var i;
		var x=document.getElementById("lr");
		
		$('#lr').empty(); 
	if(val=="rum")
	{	
		var l=document.getElementById("lv");
		x.disabled=false;
		l.style.visibility = "visible";
		for(i=1;i<=7;i++)
		{
		var option = document.createElement("option");
		option.text = "Level "+i;
		var g=option.value= i;
		l.add(option);
		}
		
		
	}
	
	else if(val=="group")
	{
		x.disabled=false;
		var option = document.createElement("option");
		option.text = "Select Item Type";
		option.value= "0";
		x.add(option);
		var option = document.createElement("option");
		option.text = "Electrical Items";
		option.value= "electrical";
		x.add(option);
		var option = document.createElement("option");
		option.text = "Furniture";
		option.value= "furniture";
		x.add(option);
	}
	
}
function level(value)
{	var x=document.getElementById("lr");
     $('#lr').empty(); 
	var v=0,i;
	for(i=1;i<=10;i++)
		{
		var option = document.createElement("option");
		v=(parseInt(value)*100)+i;
		option.text =v;
		option.value=v;
		x.add(option);
		}
}
function datas(value){

var x=document.getElementById("vt").value;
window.location.href = "view.php?item="+value+"&tp="+x;
}
</script>
<div>
<?php
include('distab.php');
?></div>
</form>

</body>
</html>

