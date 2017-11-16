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
echo "
<ul >
  <li><a href='index1.php'>INDEX</a></li>
  <li><a href='view.php'>VIEW</a></li>
  <li><a href='edit.php'>EDIT</a></li>
  <li><a href='stock.php'>STOCK MANAGEMENT</a></li>
  <li><a href='issue.php'>ISSUE</a></li>
  <li><a href='login.php'>LogOut</a></li>
  
</ul>";

include ('db.php');

$rs = mysqli_query($db,"SELECT * FROM srock");
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
  echo "Error in running query :". mysqli_error();
}
}
?>
</body>
</html>