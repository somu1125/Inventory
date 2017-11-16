<?php
include('db.php');
?>
<html>
<head>
<link href="layout/styles/main.css" rel="stylesheet" type="text/css" media="all">
<link href="layout/styles/mediaqueries.css" rel="stylesheet" type="text/css" media="all">
<link rel="stylesheet" type="text/css" href="log.css">
<link rel="stylesheet" type="text/css" href="select.css">
<script type="text/javascript" src="jquery-1.7.1.min.js">
</script>
<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #fc3333;
	opacity: 0.8;
}
li {
    float: left;
}

li a {
    display: block;
    color: white;
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
<ul >
  <li><a href="index1.php">INDEX</a></li>
  <li><a href="view.php">VIEW</a></li>
  <li><a href="edit.php">EDIT</a></li>
  <li><a href="stock.php">STOCK MANAGEMENT</a></li>
  <li><a href="issue.php">ISSUE</a></li>
  <li><a href="issue.php">ABOUT</a></li>
  
</ul>
<h1 align="center" style="color:Cyan ;margin-top:5%; font-size:5em;font-family: Times New Roman, Times, serif; font-weight: bold;" >MANAGE STOCK</h1>
<ul id="side" style="float: right;">
<li><input class="myButton" type="submit" value="ADD STOCK" onclick="add();" /></li></br>
<li><input class="myButton" type="submit" value="SHOW STOCK" onclick="show();" /></li></br>
<li><input class="myButton" type="submit" value="EDIT STOCK" onclick="esh();" /></li></br>
</ul>
<script>
function show()
{
	datas("stock");

}
function add()
{
	datas("add");

}
function esh()
{
	datas("edit");

}
function datas(value)
{
	
	if(value=="stock")
	{
		window.location.href = "shwstk.php";
	}
	else if(value=="edit")
	{
		window.location.href = "editstk.php";
	}
	else
	{
		window.location.href = "adstk.php";
	}
}
</script>

</body>
</html>