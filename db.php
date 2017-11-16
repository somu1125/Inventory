<?php
  $db = mysqli_connect("localhost","root","","invntry")
		or die('Error connecting to MySQL server.');
	mysqli_select_db($db,"invntry") or die("some thing went wrong");

?>
