<?php
include('db.php');

//include('stock.php');
$itm = strtolower($_GET["itm"]);
$bttn=$_GET["bt"];
$qty=$_GET["vl"];
//echo $itm."<br>".$bttn."<br>".$qty;
$r = mysqli_query($db,"SELECT used,not_used,total FROM srock WHERE items='$itm'");
while($row = mysqli_fetch_array($r, MYSQLI_ASSOC))
	{
      $usd= $row['used'];
      $ntusd= $row['not_used'];
      $tot=$row['total'];
       
   }
 
if($bttn=="ADD")
{
 
 
 if($ntusd==0)
 {
	 $ent=0;
 }
 else
 {
	$itr = mysqli_query($db,"SELECT id FROM $itm");
	$ent = mysqli_num_rows($itr);
	$qty=$ent+$qty;
 }
 $ent=$ent+1;
 while($ent<=$qty)
 {
	$itcode=$itm.$ent; 
	$qr2=mysqli_query($db,"INSERT INTO $itm (id) VALUES('$itcode') ") or die(mysqli_error($db));
	$ent=$ent+1;
}
 
 $frntusd=mysqli_query($db,"SELECT id FROM $itm WHERE room=0");
 $ntusd=mysqli_num_rows($frntusd);
 $frusd=mysqli_query($db,"SELECT id FROM $itm WHERE room<>0");
 $usd=mysqli_num_rows($frusd);
 $tot=$ntusd+$usd;
 $qr=mysqli_query($db,"UPDATE srock SET used='$usd',not_used='$ntusd',total='$tot' WHERE items='$itm'");
 echo "<script>alert('Items Added Successfully !!')</script>"; 
}
else
{
	if($qty<=$tot && $qty<=$ntusd)
	{
	
	while($qty>=1)
	{
		$dl=mysqli_query($db,"DELETE  FROM $itm WHERE room=0 LIMIT 1") or die(mysqli_error($db));//limit plays vital role here
		$qty=$qty-1;
	}
	echo "<script>alert('Items Deleted Successfully !!')</script>"; 
	}
	else
	{
		echo "<script>alert('Deletion Not Possible, Some items in Use!!')</script>"; 
	}
	$frntusd=mysqli_query($db,"SELECT id FROM $itm WHERE room=0");
	$ntusd=mysqli_num_rows($frntusd);
	$frusd=mysqli_query($db,"SELECT id FROM $itm WHERE room<>0");
	$usd=mysqli_num_rows($frusd);
	$tot=$ntusd+$usd;
	$qr=mysqli_query($db,"UPDATE srock SET used='$usd',not_used='$ntusd',total='$tot' WHERE items='$itm'");
}
include('editstk.php');
?>