<?php
include('db.php');


$it=strtolower($_GET["itms"]);

$q=mysqli_query($db,"SELECT id FROM $it where room=0") or die(mysqli_error($db));
$x=mysqli_num_rows($q);

	
 if ($x==0)
 {
	 echo "<script> alert('No Unused Id found For ".$it."')</script>";
 }
 else
 {
      echo "<div align='center'>"; 
	  echo "<select id='eid' >";
	  echo "<option value='0'>Select Item Id</option>";
    while ($r = mysqli_fetch_array($q,MYSQLI_ASSOC))
    {
      foreach ($r as $d)
      {
	   echo "<option value='".$d."'>".$d."</option>";
	  }  
	}
 }


echo "</select>";
?>