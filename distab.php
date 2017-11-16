<?php
include('db.php');


 if (isset($_GET["item"]) ) 
 { 
 $hello=$_GET["item"];
 $tt=$_GET["tp"];
 if ($tt=="rum")
 {
	
	$ac=mysqli_num_rows(mysqli_query($db,"SELECT *  FROM fan WHERE room='$hello'"));
	$ch=mysqli_num_rows(mysqli_query($db,"SELECT *  FROM chairs WHERE room='$hello'"));
	$prjct=mysqli_num_rows(mysqli_query($db,"SELECT * FROM projector WHERE room='$hello'"));
	$wb=mysqli_num_rows(mysqli_query($db,"SELECT *  FROM white_board WHERE room='$hello'"));
	$fn=mysqli_num_rows(mysqli_query($db,"SELECT *  FROM fan WHERE room='$hello'"));
	$lt=mysqli_num_rows(mysqli_query($db,"SELECT *  FROM light WHERE room='$hello'"));
	echo"<h5>For Room No.".$hello."</h5>";
	 echo "<table width='100%'>";
	 echo "<tr><th>ITEM</th><th>Total</th></tr>";
	 echo "<tr><td>CHAIRS</td><td>".$ch."</td></tr>";
	 echo "<tr><td>PROJECTOR</td><td>".$prjct."</td></tr>";
	 echo "<tr><td>WHITE BOARD</td><td>".$wb."</td></tr>";
	 echo "<tr><td>FAN</td><td>".$fn."</td></tr>";
	 echo "<tr><td>LIGHT</td><td>".$lt."</td></tr>";
	 echo "</table>";
	 
 }
 else
 {      

     $rs=mysqli_query($db,"SELECT * FROM $hello");
	 echo "<table width='100%'><tr>";
if($rs)
{

if(mysqli_num_rows($rs)>0)
{
	$i=0;
	 echo "<table class='tab' ><tr>";
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
}else{
  echo "<script>alert('Table Not Found')</script>";
}
}
else{ echo "<br>"."NO RECORDS FOUND !!! ";}
 }

}

?>