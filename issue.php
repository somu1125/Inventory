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
    background-color: black;
	opacity: 0.5;
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
function addr(value)
{		
		
		var i;
		var x=document.getElementById("lr");
		var val=value.charAt(5);
		
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


function chng(value)
{
	
	var item=document.getElementById("item").value;
	var pass=document.getElementById("opt").value;
	window.location.href="issue.php?item="+item+"&op="+pass;
	
}
function chngitm(value)
{
	var x =document.getElementById("opt");
}
function issueitm()
{
	var a=document.getElementById("tt").value;
	var b=document.getElementById("its").value;
	var c=document.getElementById("lr").value;
	var d=document.getElementById("tm").value;
	var e=document.getElementById("rgno").value;
	window.location.href="issue.php?a="+a+"&b="+b+"&c="+c+"&d="+d+"&e="+e;
}
function submt()
{
	var gh="sbmt";
	var x=document.getElementById("rg").value;
	window.location.href="issue.php?op="+gh+"&g="+x;
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
<div align="center">

<select id="item" onchange="chngitm(this.value);">
<option value="0">Select ITEM</option>
<option value="projector">Projector</option>
</select>
<select id="opt" onchange="chng(this.value);">
<option value="0">Select Operation</option>
<option value="iss">Issue Items</option>
<option value="sbmt">Submit Item</option>
</select>
<?php
include('db.php');

if(isset($_GET["item"]))
{
$i=$_GET["item"];
$optn=$_GET["op"];
echo "<input type='text' id='tt' hidden value='".$i."'>";
if($optn=="iss")
{
$qr=mysqli_query($db,"SELECT id FROM $i WHERE room=0")or die(mysqli_error($db));

if($qr)
{
if(mysqli_num_rows($qr)>0)
{
	$i=0;
	
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
  }else{
    echo "No Results found";
	
  }
  
}else{
  echo "Error in running query :". mysqli_error($db);
}
}
echo "</select>";
echo "<select id='lvl' onchange='addr(this.value);'>";

for($i=1;$i<=7;$i++)
{
	echo "<option value='level".$i."'>LEVEL".$i."</option>";
}
echo "</select>";
echo "<select id='lr'>";
echo "</select>";
echo "<input type='time' placeholder='date & time' id='tm'>";
echo "<input type='text' placeholder='registration number' id='rgno'>";
echo "<input class='myButton'type='submit' value='Issue' onclick='issueitm();'>";


}




else if($optn=="sbmt")
{
	
$rs=mysqli_query($db,"SELECT * FROM issue")or die(mysqli_error($db));
 echo "<table width='100%'><tr>";
if($rs)
{
	echo "<input type='text' placeholder='registration number' id='rg' required>";
	echo "<input type='submit' value='SUBMIT' onclick='submt();'>";
	echo "<table class='tab' ><tr>";
	if(isset($_GET["g"]))
	{
		$gt=$_GET["g"];
		$rs=mysqli_query($db,"DELETE FROM issue WHERE regid=$gt");
	}
	
  if (mysqli_num_rows($rs)>0)
  {
          $i = 0;
          while ($i < mysqli_num_fields($rs))
          {
			$x=mysqli_fetch_field($rs);
			echo "<th>".$x->name."</th>";
			$i++;
		  }
    echo "</tr>";
    while ($rows = mysqli_fetch_array($rs,MYSQLI_ASSOC))
    {
      echo "<tr>";
      foreach ($rows as $data)
      {
        echo "<td align='center'>". $data . "</td>";
      }
    }
  }else{
    echo "<tr><td colspan='" . ($i+1) ."'>No Results found!</td></tr>";
  }
  echo "</table>";
}else
{
  echo "Error in running query :". mysqli_error();
}

}
else
{ echo "<br>"."NO RECORDS FOUND !!! ";
}
 

}
if(isset($_GET["a"]))
{
	$itme=$_GET["a"];
	$itid=$_GET["b"];
	$rumn=$_GET["c"];
	$time=$_GET["d"];
	$rgn=$_GET["e"];
	$qry1=mysqli_query($db,"UPDATE $itme SET room='$rumn' WHERE id='$itid'");
	$frntusd=mysqli_query($db,"SELECT id FROM $itme WHERE room=0");
	$ntusd=mysqli_num_rows($frntusd);
	$frusd=mysqli_query($db,"SELECT id FROM $itme WHERE room<>0");
	$usd=mysqli_num_rows($frusd);
	$tot=$ntusd+$usd;
	$qr=mysqli_query($db,"UPDATE electrical SET used='$usd',nused='$ntusd',total='$tot' WHERE items='$itme'");
	$qr=mysqli_query($db,"UPDATE srock SET used='$usd',not_used='$ntusd',total='$tot' WHERE items='$itme'");
	$qr=mysqli_query($db,"INSERT INTO issue (item, id, regid, room, date_time) VALUES ('$itme', '$itid', '$rgn', '$rumn', '$time') ") or die(mysqli_error($db));
}

?>
</div>
</body>
</html>