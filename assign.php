<html>
<head>
<link href='layout/styles/main.css' rel='stylesheet' type='text/css' media='all'>
<link href='layout/styles/mediaqueries.css' rel='stylesheet' type='text/css' media='all'>
<link rel='stylesheet' type='text/css' href='log.css'>
<link rel="stylesheet" type="text/css" href="select.css">
<script type='text/javascript' src='jquery-1.7.1.min.js'></script>
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
<script>
function chng(value)
{		
		
		var i;
		var x=document.getElementById("lr");
		val=value.charAt(5);
		
		$('#lr').empty(); 
		for(i=1;i<=10;i++)
		{
		var option = document.createElement("option");
		var option = document.createElement("option");
		v=(parseInt(val)*100)+i;
		option.text =v;
		option.value=v;
		x.add(option);
		}
		
}
function itm(value)
{
	var z=document.getElementById("tt").value;
	var x=document.getElementById("its").value;
	window.location.href="assign.php?itms="+value+"&itm="+z+"&m="+x;
}
function chngtyp(value)

{
	var x=document.getElementById("typ");
	x.selected=true;
	window.location.href="assign.php?itm="+value;
}
function sub()
{
	
	var tp=document.getElementById("type").value;
	var rum=document.getElementById("lr").value;
	
	
	var items=document.getElementById("its").value;
	var itmid=document.getElementById("eid").value;
	window.location.href="assign.php?tp="+tp+"&rum="+rum+"&items="+items+"&itmid="+itmid;
}
</script>
</head>
<body>
<ul >
  <li><a href='index1.php'>INDEX</a></li>
  <li><a href='view.php'>VIEW</a></li>
  <li><a href='edit.php'>EDIT</a></li>
  <li><a href='stock.php'>STOCK MANAGEMENT</a></li>
  <li><a href='issue.php'>ISSUE</a></li>
  <li><a href='login.php'>LogOut</a></li>
  
</ul>
<?php
include('db.php');
//include('edit.php');?>
<div align='center'>
<select id='typ' onchange='chngtyp(this.value);'>"
<option value='0'>SELECT ITEM TYPE</option>
<option value='electrical'  >ELECTRICAL</option>
<option value='furniture'  >FURNITURE</option>
</select>
<?php


if(isset($_GET["itm"]))
{
$v=$_GET["itm"];

echo "<input type='text' id='type' hidden value='".$v."'>";

$qr=mysqli_query($db,"SELECT items FROM $v");
if($qr)
{

	
  if (mysqli_num_rows($qr)>0)
  {
      
	  echo "<select id='its' onchange='itm(this.value)'>";
	  echo "<option value='0'>Select item</option>";
    while ($rows = mysqli_fetch_array($qr,MYSQLI_ASSOC))
    {
      foreach ($rows as $data)
      {
       if($data == $_GET["m"]){
          $isSelected = " selected='selected'"; // if the option submited in form is as same as this row we add the selected tag
          } else
			  {
          $isSelected = ''; // else we remove any tag
         }
	   echo "<option value='".$data."'".$isSelected.">".strtoupper($data)."</option>";
    }  
	
    }
  }else
  {
    echo "No Results found";
	
  }
  
}else{
  echo "Error in running query :". mysqli_error($db);
}


echo "</select>";

echo "<select id='lvl' onchange='chng(this.value);'>";
echo "<option value='0'>Select LEVEL</option>";
for($i=1;$i<=10;$i++)
{
	$z=(10*$i)+$i;
	echo "<option value='level".$z."'>LEVEL".$z."</option>";
}
echo "</select>";
echo "<input type='text' id='tt' hidden value='".$v."'>";
echo"<select id='lr' >";
echo"</select>";
if(isset($_GET['itms']))
{
$it=strtolower($_GET["itms"]); 
$q=mysqli_query($db,"SELECT id FROM $it WHERE room=0") or die(mysqli_error($db));
$x=mysqli_num_rows($q);

	
 if ($x==0)
 {
	 echo "<script> alert('No Unused Id found For ".$it."')</script>";
 }
 else
 {
      
	  echo "<select id='eid' >";
	  echo "<option value='0'>Select Item Id</option>";
    while ($r = mysqli_fetch_array($q,MYSQLI_ASSOC))
    {
      foreach ($r as $d)
      {
	   echo "<option value='".$d."'>".$d."</option>";
	  }  
	}
	echo "</select>";
 }
}

}
echo "<button onclick='sub();'>CLICK</button >";
echo "</div></br>";
if(isset($_GET["tp"]))
{
	$a=$_GET["tp"];
	$b=$_GET["rum"];
	$c=$_GET["items"];
	$d=$_GET["itmid"];
	$qry1=mysqli_query($db,"UPDATE $c SET room='$b' WHERE id='$d'");
	$frntusd=mysqli_query($db,"SELECT id FROM $c WHERE room=0");
	$ntusd=mysqli_num_rows($frntusd);
	$frusd=mysqli_query($db,"SELECT id FROM $c WHERE room<>0");
	$usd=mysqli_num_rows($frusd);
	$tot=$ntusd+$usd;
	$qr=mysqli_query($db,"UPDATE $a SET used='$usd',nused='$ntusd',total='$tot' WHERE items='$c'");
	$qr=mysqli_query($db,"UPDATE srock SET used='$usd',not_used='$ntusd',total='$tot' WHERE items='$c'");
	echo "alert('Item assigned Successfully')";
	}
	

?>


</body>
</html>
