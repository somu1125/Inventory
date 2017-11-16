<html>
<head><title>Edit Stock</title>
<link href='layout/styles/main.css' rel='stylesheet' type='text/css' media='all'>
<link href='layout/styles/mediaqueries.css' rel='stylesheet' type='text/css' media='all'>
<link rel='stylesheet' type='text/css' href='log.css'>
<link rel="stylesheet" type="text/css" href="select.css">
<script type='text/javascript' src='jquery-1.7.1.min.js'>
</script>
<script>

</script>

<script>

function additm()
{
	var y=document.getElementById("qt").value;
	var it=document.getElementById("tab").value;
	var btn=document.getElementById("ad").value;
	
	if(y=="")
	{
		alert("Quantity Required");
	}
	else
	{
		window.location.href="adl.php?itm="+it+"&bt="+btn+"&vl="+y;
	}
	
}
function delitm()
{
	var y=document.getElementById("qt").value;
	var it=document.getElementById("tab").value;
	var btn1=document.getElementById("ak").value;
	if(y=="")
	{
		alert("Quantity Required");
	}
	else
	{
		window.location.href="adl.php?itm="+it+"&bt="+btn1+"&vl="+y;
	}
	
}


</script>
</head>
</body> 
<?php
include('db.php');
$nam = strtolower($_GET["id"]);
$rs = mysqli_query($db,"SELECT * FROM srock WHERE items='$nam'");

if($rs)
{
if(mysqli_num_rows($rs)>0)
{
	$i=0;
	 echo "<table class='tab' ><tr>";
  if (mysqli_num_rows($rs)>0)
  {
         echo "<table width='100%'><tr>";
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
}
}
echo "<label> Add Stock</label>";
echo "<input type=text placeholder='enter quantity' id='qt'>";
echo "<input type='submit' value ='ADD' id='ad' onclick='additm();'>";
echo "<input type='text' id='tab'value='".$nam."' hidden>";
echo "<input type='submit' value ='DELETE' id='ak' onclick='delitm();'>";


?>


</body></html>