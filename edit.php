
<html>
<head>
<link href='layout/styles/main.css' rel='stylesheet' type='text/css' media='all'>
<link href='layout/styles/mediaqueries.css' rel='stylesheet' type='text/css' media='all'>
<link rel='stylesheet' type='text/css' href='log.css'>
<link rel="stylesheet" type="text/css" href="select.css">
<script type='text/javascript' src='jquery-1.7.1.min.js'>
</script>
<script>
function clk()
{
	
	{
		window.location.href='assign.php';
	}
	
}
function clk2()
{
	
		window.location.href='remove.php';	
}
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
<?php
include('db.php');

echo "
<ul >
  <li><a href='index1.php'>INDEX</a></li>
  <li><a href='view.php'>VIEW</a></li>
  <li><a href='edit.php'>EDIT</a></li>
  <li><a href='stock.php'>STOCK MANAGEMENT</a></li>
  <li><a href='issue.php'>ISSUE</a></li>
  <li><a href='login.php'>LogOut</a></li>
  
</ul>";


?>
<div align='center'>
<input class="myButton" type="submit" onclick="clk();" value="ASSIGN"/>
<input class="myButton" type="submit" onclick="clk2();" value="Remove">

</div>
</body>
</html>
