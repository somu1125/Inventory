

<?php
include ('db.php');
include('editstk.php');
$nam1 = $_GET["item"];
$rs = mysqli_query($db,"SELECT items FROM $nam1");
if($rs)
{
if(mysqli_num_rows($rs)>0)
{
	$i=0;
	
  if (mysqli_num_rows($rs)>0)
  {
      echo "<div align=center>";  
    while ($rows = mysqli_fetch_array($rs,MYSQLI_ASSOC))
    {
      foreach ($rows as $data)
      {
        echo "<a class='tag' href='check.php?id=".$data."'>".strtoupper($data)."</a></br>";
    }  
    }
  }else{
    echo "No Results found";
  }
   echo "</div>";
}else{
  echo "Error in running query :". mysqli_error();
}
}
?>
