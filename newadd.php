<?php
include('db.php');
include('adstk.php');
$itm=$_GET["itm"];
$ityp=$_GET["typ"];
$rs=mysqli_query($db,"SELECT items FROM srock WHERE items='$itm'") or die(mysqli_error($db));
if($rs)
{
if(mysqli_num_rows($rs)==0)
{
$qry3=mysqli_query($db,"CREATE TABLE $itm (id VARCHAR(15)  , room INT(2) NOT NULL , PRIMARY KEY (id))")or die(mysqli_error($db));
$qry1=mysqli_query($db,"INSERT INTO $ityp(items) VALUE('$itm')")or die(mysqli_error($db));
$qry2=mysqli_query($db,"INSERT INTO srock(items) VALUE('$itm')")or die(mysqli_error($db));
echo "<script> alert('Item ".$itm." added Successfully !!')</script>";
}
else
{
	echo "<script> alert('Item ".$itm." already exists !!')</script>";
}	}
?>